//  Cloudflare IP 列表 (IPv4 + IPv6)
var cfCidrs = [
  "173.245.48.0/20", "103.21.244.0/22", "103.22.200.0/22", "103.31.4.0/22",
  "141.101.64.0/18", "108.162.192.0/18", "190.93.240.0/20", "188.114.96.0/20",
  "197.234.240.0/22", "198.41.128.0/17", "162.158.0.0/15", "104.16.0.0/13",
  "104.24.0.0/14", "172.64.0.0/13", "131.0.72.0/22",
  // IPv6
  "2400:cb00::/32", "2606:4700::/32", "2803:f800::/32", "2405:b500::/32",
  "2405:8100::/32", "2a06:98c0::/29", "2c0f:f248::/32"
];

var allowedNetmasks = cfCidrs.map(
  cidr => new Netmask(cidr)
);

pipy({
  _cert: new crypto.Certificate(os.read('/etc/pipy/certs/server.crt')),
  _key: new crypto.PrivateKey(os.read('/etc/pipy/certs/server.key')),
  _upstream: 'varnish:80',
  
  // 上下文变量，用于存储当前连接是否被允许
  _isAllowed: false, 
})

.listen(443)
.handleStreamStart(
  () => {
    var remoteIP = __inbound.remoteAddress;

    // 3. 使用 Netmask.contains() 进行遍历检查
    // Array.prototype.some 会在找到第一个匹配项时立即停止并返回 true
    _isAllowed = allowedNetmasks.some(
      mask => mask.contains(remoteIP)
    );

    // 调试日志 (生产环境可关闭)
    if (!_isAllowed) {
      console.log('Blocked non-Cloudflare IP: ', remoteIP);
    }
  }
)
// 4. 拦截逻辑：如果不在白名单，发送 StreamEnd 直接断开，不消耗 TLS 计算资源
.branch(
  () => !_isAllowed,
  $ => $.replaceStreamStart(new StreamEnd)
)
// 5. 正常的 TLS 和转发逻辑 (仅当 _isAllowed 为 true 时执行)
.tls({
  certificate: {
    cert: _cert,
    key: _key,
  }
})
.demuxHTTP().to(
  $ => $.muxHTTP().to(
    $ => $.connect(_upstream)
  )
)
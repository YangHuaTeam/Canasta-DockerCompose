// Cloudflare IP 列表 (IPv4 + IPv6)
var cfCidrs = [
	"173.245.48.0/20",
	"103.21.244.0/22",
	"103.22.200.0/22",
	"103.31.4.0/22",
	"141.101.64.0/18",
	"108.162.192.0/18",
	"190.93.240.0/20",
	"188.114.96.0/20",
	"197.234.240.0/22",
	"198.41.128.0/17",
	"162.158.0.0/15",
	"104.16.0.0/13",
	"104.24.0.0/14",
	"172.64.0.0/13",
	"131.0.72.0/22",
	// IPv6
	"2400:cb00::/32",
	"2606:4700::/32",
	"2803:f800::/32",
	"2405:b500::/32",
	"2405:8100::/32",
	"2a06:98c0::/29",
	"2c0f:f248::/32",
];

var allowedNetmasks = cfCidrs.map(
  cidr => new Netmask(cidr)
);

var UPSTREAM = "varnish:80";
var SERVER_CERT = new crypto.Certificate(os.read("config/certs/server.crt"));
var SERVER_KEY = new crypto.PrivateKey(os.read("config/certs/server.key"));

pipy({
	_isAllowed: false,
})

	.listen(80)
	.demuxHTTP()
	.to(($) => $.muxHTTP().to(($) => $.connect(UPSTREAM)))

	.listen(443)
	.handleStreamStart(() => {
		var remoteIP = __inbound.remoteAddress;

		_isAllowed = allowedNetmasks.some((mask) => mask.contains(remoteIP));

		if (!_isAllowed) {
			console.log("Blocked non-Cloudflare IP: ", remoteIP);
		}
	})
	.branch(
		() => !_isAllowed,
		($) => $.replaceStreamStart(new StreamEnd()),
	)
	.acceptTLS({
		certificate: {
			cert: SERVER_CERT,
			key: SERVER_KEY,
		},
	})
	.demuxHTTP()
	.to(($) => $.muxHTTP().to(($) => $.connect(UPSTREAM)));
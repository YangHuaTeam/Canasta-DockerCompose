# Canasta: Docker Compose stack repo template

使用本仓库部署 [seekstar](https://www.seekstar.org/) 同款wiki站！


## 本下游 部分特征

- `config/default.vcl` 变更：不再支持 MobileFrontend 这种依赖 http header `X-Device` 的拓展，我们使用响应式的 Citizen 主题作为替代。
- 为放置在 cloudflare 代理后面而配置
  - 依赖 cf 特定的 http header `CF-Connecting-IP`，如果你不使用 cf 反向代理，请修改相关文件。
  - 如果你不使用 cf 反向代理，请删去 `config/Caddyfile` 中的 `tls ...` 行。
- 使用 S3 存储桶存放文件。

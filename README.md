# SearchNotice SDK

Search the Advice Slip catalogue for slips containing a given term

> TypeScript, Python, PHP, Golang, Ruby, Lua SDKs, a CLI, an interactive REPL, and an MCP server for AI agents — all generated from one OpenAPI spec by [@voxgig/sdkgen](https://github.com/voxgig/sdkgen).

## About Search Notice API

This SDK is a focused subset of the [Advice Slip JSON API](https://api.adviceslip.com) run by Tom Kiss, exposing just the search endpoint. The wider API serves short pieces of advice ("slips") and hands out over 10 million of them each year.

What you get from this SDK:

- Full-text search via `GET /advice/search/{query}`, which returns a search object containing `total_results`, the original `query`, and an array of matching slip objects (each with `slip_id` and `advice`).
- If no slips match the query, the API responds with a `message` object describing the notice instead of slips.

Operational notes: there is no authentication, CORS is enabled, and responses are cached for 2 seconds (a repeat call inside that window returns the same result). Optional JSONP is supported via a `callback` query parameter.

Note: this slug is a search-only subset of the broader `advice-slip` API and points at the same upstream service.

## Try it

**TypeScript**
```bash
npm install search-notice
```

**Python**
```bash
pip install search-notice-sdk
```

**PHP**
```bash
composer require voxgig/search-notice-sdk
```

**Golang**
```bash
go get github.com/voxgig-sdk/search-notice-sdk/go
```

**Ruby**
```bash
gem install search-notice-sdk
```

**Lua**
```bash
luarocks install search-notice-sdk
```

## 30-second quickstart

### TypeScript

```ts
import { SearchNoticeSDK } from 'search-notice'

const client = new SearchNoticeSDK({})

```

See the [TypeScript README](ts/README.md) for the
full guide, or scroll down for the same example in other languages.

## What's in the box

| Surface | Use it for | Path |
| --- | --- | --- |
| **SDK** (TypeScript, Python, PHP, Golang, Ruby, Lua) | App integration | `ts/` `py/` `php/` `go/` `rb/` `lua/` |
| **CLI** | Scripts, CI, ops, one-off API calls | `go-cli/` |
| **MCP server** | AI agents (Claude, Cursor, Cline) | `go-mcp/` |

## Use it from an AI agent (MCP)

The generated MCP server exposes every operation in this SDK as an
[MCP](https://modelcontextprotocol.io) tool that Claude, Cursor or Cline
can call directly. Build and register it:

```bash
cd go-mcp && go build -o search-notice-mcp .
```

Then add it to your agent's MCP config (Claude Desktop, Cursor, etc.):

```json
{
  "mcpServers": {
    "search-notice": {
      "command": "/abs/path/to/search-notice-mcp"
    }
  }
}
```

## Entities

The API exposes one entity:

| Entity | Description | API path |
| --- | --- | --- |
| **Search** | Full-text search over the Advice Slip catalogue at `GET /advice/search/{query}`, returning `total_results`, the submitted `query`, and an array of matching slip objects; if nothing matches, a `message` object is returned instead. | `/advice/search/{query}` |

Each entity supports the following operations where available: **load**,
**list**, **create**, **update**, and **remove**.

## Quickstart in other languages

### Python

```python
from searchnotice_sdk import SearchNoticeSDK

client = SearchNoticeSDK({})


# Load a specific search
search, err = client.Search(None).load(
    {"id": "example_id"}, None
)
```

### PHP

```php
<?php
require_once 'searchnotice_sdk.php';

$client = new SearchNoticeSDK([]);


// Load a specific search
[$search, $err] = $client->Search(null)->load(
    ["id" => "example_id"], null
);
```

### Golang

```go
import sdk "github.com/voxgig-sdk/search-notice-sdk/go"

client := sdk.NewSearchNoticeSDK(map[string]any{})

```

### Ruby

```ruby
require_relative "SearchNotice_sdk"

client = SearchNoticeSDK.new({})


# Load a specific search
search, err = client.Search(nil).load(
  { "id" => "example_id" }, nil
)
```

### Lua

```lua
local sdk = require("search-notice_sdk")

local client = sdk.new({})


-- Load a specific search
local search, err = client:Search(nil):load(
  { id = "example_id" }, nil
)
```

## Unit testing in offline mode

Every SDK ships a test mode that swaps the HTTP transport for an
in-memory mock, so unit tests run offline.

### TypeScript

```ts
const client = SearchNoticeSDK.test()
const result = await client.Search().load({ id: 'test01' })
// result.ok === true, result.data contains mock data
```

### Python

```python
client = SearchNoticeSDK.test(None, None)
result, err = client.Search(None).load(
    {"id": "test01"}, None
)
```

### PHP

```php
$client = SearchNoticeSDK::test(null, null);
[$result, $err] = $client->Search(null)->load(
    ["id" => "test01"], null
);
```

### Golang

```go
client := sdk.TestSDK(nil, nil)
result, err := client.Search(nil).Load(
    map[string]any{"id": "test01"}, nil,
)
```

### Ruby

```ruby
client = SearchNoticeSDK.test(nil, nil)
result, err = client.Search(nil).load(
  { "id" => "test01" }, nil
)
```

### Lua

```lua
local client = sdk.test(nil, nil)
local result, err = client:Search(nil):load(
  { id = "test01" }, nil
)
```

## How it works

Every SDK call runs the same five-stage pipeline:

1. **Point** — resolve the API endpoint from the operation definition.
2. **Spec** — build the HTTP specification (URL, method, headers, body).
3. **Request** — send the HTTP request.
4. **Response** — receive and parse the response.
5. **Result** — extract the result data for the caller.

A feature hook fires at each stage (e.g. `PrePoint`, `PreSpec`,
`PreRequest`), so features can inspect or modify the pipeline without
forking the SDK.

### Features

| Feature | Purpose |
| --- | --- |
| **TestFeature** | In-memory mock transport for testing without a live server |

Pass custom features via the `extend` option at construction time.

### Direct and Prepare

For endpoints the entity model doesn't cover, use the low-level methods:

- **`direct(fetchargs)`** — build and send an HTTP request in one step.
- **`prepare(fetchargs)`** — build the request without sending it.

Both accept a map with `path`, `method`, `params`, `query`,
`headers`, and `body`. See the [How-to guides](#how-to-guides) below.

## How-to guides

### Make a direct API call

When the entity interface does not cover an endpoint, use `direct`:

**TypeScript:**
```ts
const result = await client.direct({
  path: '/api/resource/{id}',
  method: 'GET',
  params: { id: 'example' },
})
console.log(result.data)
```

**Python:**
```python
result, err = client.direct({
    "path": "/api/resource/{id}",
    "method": "GET",
    "params": {"id": "example"},
})
```

**PHP:**
```php
[$result, $err] = $client->direct([
    "path" => "/api/resource/{id}",
    "method" => "GET",
    "params" => ["id" => "example"],
]);
```

**Go:**
```go
result, err := client.Direct(map[string]any{
    "path":   "/api/resource/{id}",
    "method": "GET",
    "params": map[string]any{"id": "example"},
})
```

**Ruby:**
```ruby
result, err = client.direct({
  "path" => "/api/resource/{id}",
  "method" => "GET",
  "params" => { "id" => "example" },
})
```

**Lua:**
```lua
local result, err = client:direct({
  path = "/api/resource/{id}",
  method = "GET",
  params = { id = "example" },
})
```

## Per-language documentation

- [TypeScript](ts/README.md)
- [Python](py/README.md)
- [PHP](php/README.md)
- [Golang](go/README.md)
- [Ruby](rb/README.md)
- [Lua](lua/README.md)

## Using the Search Notice API

- Upstream: [https://api.adviceslip.com](https://api.adviceslip.com)

- The Advice Slip JSON API is provided free of charge by Tom Kiss (© 2013–2026).
- No API key or authentication is required.
- Responses are cached for 2 seconds, so repeat requests within that window return the same result.
- The creator suggests supporting the service via Ko-fi ("buy them a coffee or beer") if you find it useful.

---

Generated from the Search Notice API OpenAPI spec by [@voxgig/sdkgen](https://github.com/voxgig/sdkgen).

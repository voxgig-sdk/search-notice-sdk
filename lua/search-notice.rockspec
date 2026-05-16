package = "voxgig-sdk-search-notice"
version = "0.0-1"
source = {
  url = "git://github.com/voxgig-sdk/search-notice-sdk.git"
}
description = {
  summary = "SearchNotice SDK for Lua",
  license = "MIT"
}
dependencies = {
  "lua >= 5.3",
  "dkjson >= 2.5",
  "dkjson >= 2.5",
}
build = {
  type = "builtin",
  modules = {
    ["search-notice_sdk"] = "search-notice_sdk.lua",
    ["config"] = "config.lua",
    ["features"] = "features.lua",
  }
}

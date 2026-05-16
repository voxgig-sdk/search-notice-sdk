-- SearchNotice SDK error

local SearchNoticeError = {}
SearchNoticeError.__index = SearchNoticeError


function SearchNoticeError.new(code, msg, ctx)
  local self = setmetatable({}, SearchNoticeError)
  self.is_sdk_error = true
  self.sdk = "SearchNotice"
  self.code = code or ""
  self.msg = msg or ""
  self.ctx = ctx
  self.result = nil
  self.spec = nil
  return self
end


function SearchNoticeError:error()
  return self.msg
end


function SearchNoticeError:__tostring()
  return self.msg
end


return SearchNoticeError

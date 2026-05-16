# SearchNotice SDK utility: make_context
require_relative '../core/context'
module SearchNoticeUtilities
  MakeContext = ->(ctxmap, basectx) {
    SearchNoticeContext.new(ctxmap, basectx)
  }
end

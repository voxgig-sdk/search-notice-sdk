# SearchNotice SDK utility: make_context

from projectname_sdk.core.context import SearchNoticeContext


def make_context_util(ctxmap, basectx):
    return SearchNoticeContext(ctxmap, basectx)

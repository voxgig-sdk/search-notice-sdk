<?php
declare(strict_types=1);

// SearchNotice SDK utility: prepare_body

class SearchNoticePrepareBody
{
    public static function call(SearchNoticeContext $ctx): mixed
    {
        if ($ctx->op->input === 'data') {
            return ($ctx->utility->transform_request)($ctx);
        }
        return null;
    }
}

<?php
declare(strict_types=1);

// SearchNotice SDK utility: result_headers

class SearchNoticeResultHeaders
{
    public static function call(SearchNoticeContext $ctx): ?SearchNoticeResult
    {
        $response = $ctx->response;
        $result = $ctx->result;
        if ($result) {
            if ($response && is_array($response->headers)) {
                $result->headers = $response->headers;
            } else {
                $result->headers = [];
            }
        }
        return $result;
    }
}

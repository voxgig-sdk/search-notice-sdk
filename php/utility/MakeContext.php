<?php
declare(strict_types=1);

// SearchNotice SDK utility: make_context

require_once __DIR__ . '/../core/Context.php';

class SearchNoticeMakeContext
{
    public static function call(array $ctxmap, ?SearchNoticeContext $basectx): SearchNoticeContext
    {
        return new SearchNoticeContext($ctxmap, $basectx);
    }
}

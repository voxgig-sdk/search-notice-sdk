<?php
declare(strict_types=1);

// SearchNotice SDK base feature

class SearchNoticeBaseFeature
{
    public string $version;
    public string $name;
    public bool $active;

    // Positions this feature when added via the client `extend` option:
    // "__before__" / "__after__" / "__replace__" name an already-added
    // feature (mirrors the ts feature `_options`). Declared so setting it
    // on an extension instance avoids the dynamic-property deprecation.
    public ?array $_options = null;

    public function __construct()
    {
        $this->version = '0.0.1';
        $this->name = 'base';
        $this->active = true;
    }

    public function get_version(): string { return $this->version; }
    public function get_name(): string { return $this->name; }
    public function get_active(): bool { return $this->active; }

    public function init(SearchNoticeContext $ctx, array $options): void {}
    public function PostConstruct(SearchNoticeContext $ctx): void {}
    public function PostConstructEntity(SearchNoticeContext $ctx): void {}
    public function SetData(SearchNoticeContext $ctx): void {}
    public function GetData(SearchNoticeContext $ctx): void {}
    public function GetMatch(SearchNoticeContext $ctx): void {}
    public function SetMatch(SearchNoticeContext $ctx): void {}
    public function PrePoint(SearchNoticeContext $ctx): void {}
    public function PreSpec(SearchNoticeContext $ctx): void {}
    public function PreRequest(SearchNoticeContext $ctx): void {}
    public function PreResponse(SearchNoticeContext $ctx): void {}
    public function PreResult(SearchNoticeContext $ctx): void {}
    public function PreDone(SearchNoticeContext $ctx): void {}
    public function PreUnexpected(SearchNoticeContext $ctx): void {}
}

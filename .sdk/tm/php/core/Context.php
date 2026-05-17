<?php
declare(strict_types=1);

// SearchNotice SDK context

require_once __DIR__ . '/Control.php';
require_once __DIR__ . '/Operation.php';
require_once __DIR__ . '/Spec.php';
require_once __DIR__ . '/Result.php';
require_once __DIR__ . '/Response.php';
require_once __DIR__ . '/Error.php';
require_once __DIR__ . '/Helpers.php';

class SearchNoticeContext
{
    public string $id;
    public array $out;
    public mixed $client;
    public ?SearchNoticeUtility $utility;
    public SearchNoticeControl $ctrl;
    public array $meta;
    public ?array $config;
    public ?array $entopts;
    public ?array $options;
    public mixed $entity;
    public ?array $shared;
    public array $opmap;
    public array $data;
    public array $reqdata;
    public array $match;
    public array $reqmatch;
    public ?array $point;
    public ?SearchNoticeSpec $spec;
    public ?SearchNoticeResult $result;
    public ?SearchNoticeResponse $response;
    public SearchNoticeOperation $op;

    public function __construct(array $ctxmap = [], ?self $basectx = null)
    {
        $this->id = 'C' . random_int(10000000, 99999999);
        $this->out = [];

        $this->client = SearchNoticeHelpers::get_ctx_prop($ctxmap, 'client') ?? ($basectx ? $basectx->client : null);
        $this->utility = SearchNoticeHelpers::get_ctx_prop($ctxmap, 'utility') ?? ($basectx ? $basectx->utility : null);

        $this->ctrl = new SearchNoticeControl();
        $ctrl_raw = SearchNoticeHelpers::get_ctx_prop($ctxmap, 'ctrl');
        if (is_array($ctrl_raw)) {
            if (array_key_exists('throw', $ctrl_raw)) {
                $this->ctrl->throw_err = $ctrl_raw['throw'];
            }
            if (isset($ctrl_raw['explain']) && is_array($ctrl_raw['explain'])) {
                $this->ctrl->explain = $ctrl_raw['explain'];
            }
        } elseif ($basectx !== null && $basectx->ctrl !== null) {
            $this->ctrl = $basectx->ctrl;
        }

        $m = SearchNoticeHelpers::get_ctx_prop($ctxmap, 'meta');
        $this->meta = is_array($m) ? $m : ($basectx ? $basectx->meta ?? [] : []);

        $cfg = SearchNoticeHelpers::get_ctx_prop($ctxmap, 'config');
        $this->config = is_array($cfg) ? $cfg : ($basectx ? $basectx->config : null);

        $eo = SearchNoticeHelpers::get_ctx_prop($ctxmap, 'entopts');
        $this->entopts = is_array($eo) ? $eo : ($basectx ? $basectx->entopts : null);

        $o = SearchNoticeHelpers::get_ctx_prop($ctxmap, 'options');
        $this->options = is_array($o) ? $o : ($basectx ? $basectx->options : null);

        $e = SearchNoticeHelpers::get_ctx_prop($ctxmap, 'entity');
        $this->entity = $e ?? ($basectx ? $basectx->entity : null);

        $s = SearchNoticeHelpers::get_ctx_prop($ctxmap, 'shared');
        $this->shared = is_array($s) ? $s : ($basectx ? $basectx->shared : null);

        $om = SearchNoticeHelpers::get_ctx_prop($ctxmap, 'opmap');
        $this->opmap = is_array($om) ? $om : ($basectx ? $basectx->opmap ?? [] : []);

        $this->data = SearchNoticeHelpers::to_map(SearchNoticeHelpers::get_ctx_prop($ctxmap, 'data')) ?? [];
        $this->reqdata = SearchNoticeHelpers::to_map(SearchNoticeHelpers::get_ctx_prop($ctxmap, 'reqdata')) ?? [];
        $this->match = SearchNoticeHelpers::to_map(SearchNoticeHelpers::get_ctx_prop($ctxmap, 'match')) ?? [];
        $this->reqmatch = SearchNoticeHelpers::to_map(SearchNoticeHelpers::get_ctx_prop($ctxmap, 'reqmatch')) ?? [];

        $pt = SearchNoticeHelpers::get_ctx_prop($ctxmap, 'point');
        $this->point = is_array($pt) ? $pt : ($basectx ? $basectx->point : null);

        $sp = SearchNoticeHelpers::get_ctx_prop($ctxmap, 'spec');
        $this->spec = ($sp instanceof SearchNoticeSpec) ? $sp : ($basectx ? $basectx->spec : null);

        $r = SearchNoticeHelpers::get_ctx_prop($ctxmap, 'result');
        $this->result = ($r instanceof SearchNoticeResult) ? $r : ($basectx ? $basectx->result : null);

        $rp = SearchNoticeHelpers::get_ctx_prop($ctxmap, 'response');
        $this->response = ($rp instanceof SearchNoticeResponse) ? $rp : ($basectx ? $basectx->response : null);

        $opname = SearchNoticeHelpers::get_ctx_prop($ctxmap, 'opname') ?? '';
        $this->op = $this->resolve_op($opname);
    }

    public function resolve_op(string $opname): SearchNoticeOperation
    {
        // Cache key is `<entity>:<opname>` so two entities with the same op
        // (e.g. both have a "list") get distinct cached Operations. Keying
        // on opname alone caused the first-resolved entity's points to be
        // served to every subsequent entity's call.
        $entname = (is_object($this->entity) && method_exists($this->entity, 'get_name'))
            ? $this->entity->get_name()
            : '_';
        $cacheKey = $entname . ':' . $opname;

        if (isset($this->opmap[$cacheKey])) {
            return $this->opmap[$cacheKey];
        }
        if ($opname === '') {
            return new SearchNoticeOperation([]);
        }

        $opcfg = \Voxgig\Struct\Struct::getpath($this->config, "entity.{$entname}.op.{$opname}");

        $input = ($opname === 'update' || $opname === 'create') ? 'data' : 'match';

        $points = [];
        if (is_array($opcfg)) {
            $t = \Voxgig\Struct\Struct::getprop($opcfg, 'points');
            if (is_array($t)) {
                $points = $t;
            }
        }

        $op = new SearchNoticeOperation([
            'entity' => $entname,
            'name' => $opname,
            'input' => $input,
            'points' => $points,
        ]);
        $this->opmap[$cacheKey] = $op;
        return $op;
    }

    public function make_error(string $code, string $msg): SearchNoticeError
    {
        return new SearchNoticeError($code, $msg, $this);
    }
}

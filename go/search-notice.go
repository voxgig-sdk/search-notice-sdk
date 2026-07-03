package voxgigsearchnoticesdk

import (
	"github.com/voxgig-sdk/search-notice-sdk/go/core"
	"github.com/voxgig-sdk/search-notice-sdk/go/entity"
	"github.com/voxgig-sdk/search-notice-sdk/go/feature"
	_ "github.com/voxgig-sdk/search-notice-sdk/go/utility"
)

// Type aliases preserve external API.
type SearchNoticeSDK = core.SearchNoticeSDK
type Context = core.Context
type Utility = core.Utility
type Feature = core.Feature
type Entity = core.Entity
type SearchNoticeEntity = core.SearchNoticeEntity
type FetcherFunc = core.FetcherFunc
type Spec = core.Spec
type Result = core.Result
type Response = core.Response
type Operation = core.Operation
type Control = core.Control
type SearchNoticeError = core.SearchNoticeError

// BaseFeature from feature package.
type BaseFeature = feature.BaseFeature

func init() {
	core.NewBaseFeatureFunc = func() core.Feature {
		return feature.NewBaseFeature()
	}
	core.NewTestFeatureFunc = func() core.Feature {
		return feature.NewTestFeature()
	}
	core.NewSearchEntityFunc = func(client *core.SearchNoticeSDK, entopts map[string]any) core.SearchNoticeEntity {
		return entity.NewSearchEntity(client, entopts)
	}
}

// Constructor re-exports.
var NewSearchNoticeSDK = core.NewSearchNoticeSDK
var TestSDK = core.TestSDK
var NewContext = core.NewContext
var NewSpec = core.NewSpec
var NewResult = core.NewResult
var NewResponse = core.NewResponse
var NewOperation = core.NewOperation
var MakeConfig = core.MakeConfig

// No-arg convenience constructors. Go has no default-argument syntax,
// so these aliases let callers write `sdk.New()` / `sdk.Test()`
// instead of `sdk.NewSearchNoticeSDK(nil)` / `sdk.TestSDK(nil, nil)`
// for the common no-options case.
func New() *SearchNoticeSDK  { return NewSearchNoticeSDK(nil) }
func Test() *SearchNoticeSDK { return TestSDK(nil, nil) }
var NewBaseFeature = feature.NewBaseFeature
var NewTestFeature = feature.NewTestFeature

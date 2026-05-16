package core

var UtilityRegistrar func(u *Utility)

var NewBaseFeatureFunc func() Feature

var NewTestFeatureFunc func() Feature

var NewSearchEntityFunc func(client *SearchNoticeSDK, entopts map[string]any) SearchNoticeEntity


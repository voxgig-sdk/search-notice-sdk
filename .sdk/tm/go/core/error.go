package core

type SearchNoticeError struct {
	IsSearchNoticeError bool
	Sdk              string
	Code             string
	Msg              string
	Ctx              *Context
	Result           any
	Spec             any
}

func NewSearchNoticeError(code string, msg string, ctx *Context) *SearchNoticeError {
	return &SearchNoticeError{
		IsSearchNoticeError: true,
		Sdk:              "SearchNotice",
		Code:             code,
		Msg:              msg,
		Ctx:              ctx,
	}
}

func (e *SearchNoticeError) Error() string {
	return e.Msg
}

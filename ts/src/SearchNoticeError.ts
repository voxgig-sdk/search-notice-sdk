
import { Context } from './Context'


class SearchNoticeError extends Error {

  isSearchNoticeError = true

  sdk = 'SearchNotice'

  code: string
  ctx: Context

  constructor(code: string, msg: string, ctx: Context) {
    super(msg)
    this.code = code
    this.ctx = ctx
  }

}

export {
  SearchNoticeError
}


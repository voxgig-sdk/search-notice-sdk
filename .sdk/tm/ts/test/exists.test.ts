
import { test, describe } from 'node:test'
import { equal } from 'node:assert'


import { SearchNoticeSDK } from '..'


describe('exists', async () => {

  test('test-mode', async () => {
    const testsdk = await SearchNoticeSDK.test()
    equal(null !== testsdk, true)
  })

})

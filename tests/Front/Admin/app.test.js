import { shallow } from 'vue-test-utils'
import App from './../../../resources/assets/js/components/v-app'

describe('App.test.js', () => {
    let cmp, vm
    beforeEach(() => {
        cmp = shallow(App)
    })
    it('have link title', () => {
        expect(cmp.find('a.sas-menu').html()).to.equal('SAS Judo Jujitsu')
    })
})

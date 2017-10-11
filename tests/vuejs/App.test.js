import { shallow } from 'vue-test-utils'
import App from './../resources/assets/js/app.js'

describe('App.test.js', () => {
    let cmp, vm

    beforeEach(() => {
        cmp = shallow(App, { // Create a shallow instance of the component
            data: {
                messages: ['Cat']
            }
        })
    })
    
    it('equals messages to ["Cat"]', () => {
        expect(vm.messages).toEqual(['Cat'])
    })
})
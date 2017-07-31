export default {
    data() {
        return {
            categories:     [],
            types:          [],
            typeSelected:   '',
            name:           '',
            formErrors: [
                { 'name': 'name', 'human': 'Nom du menu'}, 
                { 'name': 'categories', 'human': "Menu(s)"}
            ]
        }
    }
}
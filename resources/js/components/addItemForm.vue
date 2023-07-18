<template>
    <div class="addItem">
        <input type="text" v-model="item.name">
        <font-awesome-icon 
        icon="fas fa-plus-square" 
        @click="addItem()"
        :class="[item.name ? 'active' : 'inactive', 'plus']" />
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data: function () {
        return {
            item: {
                name: ''
            }
        }
    },
    methods: {
        addItem(){
            if (this.item.name==''){
                return;
            }
            axios.post('api/item/store', {
                item: this.item
            })
            .then(response => {
                if (response.status == 201){
                    this.item.name = '';
                    this.$emit('reloadlist');
                }
            })
            .catch(error => {
                console.log(error);
            })
        }
    }
}
</script>

<style scoped>
.addItem {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #e6e6e6;
}

input {
    width: 85%;
    padding: 5px;
    border: none;
    border-radius: 2px;
    background: #f7f7f7;
    outline: none;
}

.plus {
    font-size: 20px;
    color: #ccc;
    cursor: pointer;
}

.active {
    color: #00CE25;
}

.inactive {
    color: #ccc;
}
</style>
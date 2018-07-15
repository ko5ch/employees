<template>
      <div id="app">
        <div class="heading">
            <h1>Tree</h1>
            <hr/>
        </div>
<ul id="nested">
       <tree class="item" v-for="item in items" :items="item"></tree>
</ul>
    </div>
</template>
<script>
function Tree({id, name, lb, rb, position, children_recursive}){
        this.id = id;
        this.name = name;
        this.lb = lb;
        this.rb = rb;
        this.position = position;
        this.children_recursive = children_recursive;
}

import TreeComponent from './TreeComponent.vue'

export default {
 data: function(){
            return {
              items: [],
              is_refresh: false,
            }
        },
        mounted() {
            this.update()
        },
        methods: {
            update: function() {
                this.is_refresh = true
                axios.get('/tree').then((response) => {
                    // console.log(response.data["0"].children_recursive) 
                    response.data.forEach(item => {
                        this.items.push( new Tree(item));
                    });
                    this.is_refresh = false
                });
            },

            // hasLeafs(item) {
            //     return (item.rb-item.lb)>1
            // },

            // isRoot() {
            //     return (this.treedata[0]['rb']-this.treedata[0]['lb'])>1
            // },

            // isNode() {
            //     return (this.treedata.rb-this.treedata.lb)<1
            // },
        },
        components: {
            TreeComponent
        }
}
    //create element, toogle, v-show 
</script>

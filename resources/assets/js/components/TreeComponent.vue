<template>
      <li>
      	<div class="tree"  @click="toggle">
	        <strong>Name:</strong> {{ items.name }} <br> 
	        <strong>Position:</strong> {{ items.position }}
		     <span v-if="isFolder">[{{open ? '-' : '+'}}]</span>
	    </div>
	    <ul v-show="open"  v-if="isFolder">
	        <tree
	          class="item"
	          v-for="item in items.children_recursive"
	          :items="item" 
	        ></tree>
	        </ul>
      </li>
</template>

<script>
	export default {

		props: ['items'],

        data: function () {
    	  return {
      		open: false
    	  }
  		},
  		computed: {
          isFolder: function () {
            return (this.items.rb-this.items.lb)>1
    		}
  		},
  		methods: {
  		  toggle: function () {
      	    if (this.isFolder) {
            this.open = !this.open
            }
    	  },
  		}
		
	}
</script>
<style>
#app{
  font-family: Menlo, Consolas, monospace;
  color: #444;
}
.item {
  cursor: pointer;
}
.bold {
  font-weight: bold;
}
.tree-list ul {
  padding-left: 16px;
  margin: 6px 0;
}
</style>
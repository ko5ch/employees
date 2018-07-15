<template>
	<ul>
      <li v-for="item in items" :key="item.id">
      	<div class="tree"  @click="toggle">
	        <strong>Name:</strong> {{ item.name }} | 
	        <!-- <strong>Position:</strong> {{ item.position }} -->
		     <span v-if="isFolder(item)">[{{open ? '-' : '+'}}]</span>
	    </div>
	        <tree
	          v-if="item.children_recursive && item.children_recursive.length"
	          :items="item.children_recursive" v-show="open"
	        ></tree>
      </li>
    </ul>
</template>

<script>
	export default {

		props: ['items'],

        data: function () {
    	  return {
      		open: false
    	  }
  		},
  		// computed: {
    //       isFolder: function () {
    //         return (this.item.rb-this.item.lb)>1
    // 		}
  		// },
  		methods: {
  		  toggle: function () {
      	    if (this.isFolder) {
            this.open = !this.open
            }
    	  },
    	  isFolder(item) {
    	  	return (item.rb-item.lb)>1
    	  }
  		}
		
	}
</script>
<style>
.tree-list ul {
  padding-left: 16px;
  margin: 6px 0;
}
</style>
<template>
	<div id="ti-mmb-main">
		<MenuSelector/>


		<!--<draggable v-model="myArray" :options="{group:'people', animation: 100, handle: 'i'}">-->
			<!--<div class="pb-main-element" v-for="element in myArray" :key="element.id">-->
				<!--<h2>-->
					<!--<i class="dashicons dashicons-menu"></i>-->
					<!--{{element.name}}-->
				<!--</h2>-->
			<!--</div>-->
		<!--</draggable>-->


		<template v-if="navMenuPreview !== null">
			<div v-for="item in navMenuPreview" :key="item.ID">
				<draggable
						v-if="item.classes.indexOf( 'neve-mega-menu' ) !== '-1'"
						v-model="megaMenuChildren"
						:options="{group:'mega-menu'}"
						@start="drag=true"
						@end="drag=false">
				</draggable>
				{{ item.title }}
			</div>
		</template>
	</div>
</template>

<script>
	import MenuSelector from "./MenuSelector.vue";
	import draggable from 'vuedraggable'

	export default {
		name: 'app',
		data() {
			return {
				megaMenuChildren: [],
			}
		},
		computed: {
			navMenuPreview() {
				return this.$store.state.navMenuPreview;
			}
		},
		components: { MenuSelector, draggable }
	}
</script>

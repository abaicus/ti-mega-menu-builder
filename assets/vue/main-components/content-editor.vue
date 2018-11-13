<template>
	<div>
		<draggable v-model="myArray" :options="{group:'people', animation: 100, handle: 'i'}" class="xxx">
			<div class="pb-main-element" v-for="element in myArray" :key="element.id">
				<h2>
					<i class="dashicons dashicons-menu"></i>
					{{element.name}}
				</h2>
			</div>
		</draggable>
		<hr>
		<draggable v-model="empty" :options="{group:'people', animation: 100, handle: 'i'}" class="xxx">
			<div class="pb-main-element" v-for="element in empty" :key="element.id">
				<h2>
					<i class="dashicons dashicons-menu"></i>
					{{element.name}}
				</h2>
			</div>
		</draggable>
	</div>
</template>

<script>
	import draggable from 'vuedraggable'

	export default {
		name: "content-editor",
		components: {
			draggable
		},
		data() {
			return {
				myArray: [
					{
						name: 'coco',
					},
					{
						name: 'jambo',
					}
				],
				empty: [
					{
						name: 'jambo',
					}
				]
			}
		}
	}
</script>

<style lang="scss">
	.pb-main-element {
		cursor: grab;
		border: 1px solid transparent;
		-webkit-transition: all 200ms cubic-bezier(0.68, 0.69, 0.9, 1);
		transition: all 200ms cubic-bezier(0.68, 0.69, 0.9, 1);
		&:active, &:focus, &:focus-within {
			border: 1px solid red;
			cursor: grabbing;
			cursor: -moz-grabbing;
			cursor: -webkit-grabbing;
		}
		&:hover {
			border: 1px solid #333;
		}
	}

	.xxx {
		padding: 20px 0;
	}
</style>
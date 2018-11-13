<template>
	<div id="press-blocks-sidebar" :class="opened ? 'opened' : '' ">
		<button class="button button-primary pb-open-sidebar" @click="opened = !opened" v-html="opened ? 'Hide' : 'Show'"></button>
	</div>
</template>

<script>
	export default {
		name: "sidebar",
		data() {
			return {
				opened: false,
			}
		}
	}
</script>

<style scoped lang="scss">
	#press-blocks-sidebar {
		z-index: 9999999;
		bottom: 0;
		position: fixed;
		right: -320px;
		top: 0;
		padding: 30px 0;
		width: 320px;
		background: #fff;
		display: flex;
		align-items: center;
		justify-content: center;
		height: 100vh;
		border-left: 1px solid #ccc;
		-webkit-transition: all 500ms cubic-bezier(0.68, -0.2, 0.265, 1);
		transition: all 500ms cubic-bezier(0.68, -0.2, 0.265, 1);
		&.opened {
			right: -20px;
		 }
		.pb-open-sidebar {
			position: absolute;
			top: 150px;
			left: 0;
			width: auto;
			transform: translateX( -100% );
			height: 50px;
			cursor: pointer;
			border-radius: 3px 0 0 3px;
		}
	}
</style>
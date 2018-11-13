<template>
	<div id="press-blocks-main">
		<sidebar></sidebar>
		<content-editor></content-editor>
	</div>
</template>

<script>
	import Sidebar from './main-components/sidebar.vue'
	import ContentEditor from './main-components/content-editor.vue'

	export default {
		name: 'app',
		data() {
			return {
				msg: 'Welcome to Your Vue.js App'
			}
		},
		components: {
			Sidebar,
			ContentEditor
		}
	}
</script>

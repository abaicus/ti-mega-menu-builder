<template>
	<div>
		<select name="menu" id="ti-mmb-menu-selector" @change="updateSelectedMenu" v-model="selectedMenu">
			<option value="default" selected>{{strings.selectMenu}}</option>
			<option value="new-menu" selected>{{strings.newMenu}}</option>
			<option v-for="menu in navMenus" :key="menu.slug" :value="menu.slug">
				{{menu.name}}
			</option>
		</select>
		<template v-if="selectedMenu === 'new-menu'">
			<input v-model="newMenuName" type="text" :placeholder="strings.menuName">
			<button :disabled="! newMenuName.length" class="button button-primary button-icon" @click="createMenu">
				{{strings.createMenu}}
			</button>
		</template>
	</div>
</template>
<script>
	export default {
		name: 'MenuSelector',
		data() {
			return {
				strings: tiMmb.strings,
				selectedMenu: 'default',
				newMenuName: '',
			}
		},
		methods: {
			updateSelectedMenu() {
				this.$store.dispatch( 'getMenu', {
					req: 'Get menu: ' + this.selectedMenu,
					data: { slug: this.selectedMenu },
				} )
			},
			createMenu() {
				this.$store.dispatch( 'createMenu', {
					req: 'Creating menu: ' + this.menuName,
					data: {
						name: this.newMenuName,
					},
				} );
			}
		},
		computed: {
			navMenus() {
				return tiMmb.navMenus;
			},
			navMenuPreview() {
				return this.$store.state.navMenuPreview;
			}
		},
	}
</script>
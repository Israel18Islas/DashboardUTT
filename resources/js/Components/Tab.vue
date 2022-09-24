<template lang="pug">
InertiaLink.tab(
	:href="href"
	:class="computedTabClass"
	:preserve-state="preserveState"
    :preserve-scroll="preserveScroll")

	span(v-if="!$slots.tabContent") {{ text }}	
	
	slot(
		v-else
		name="tabContent")
</template>

<script>
import { InertiaLink } from '@inertiajs/inertia-vue3';
export default {
	name: 'Tab',

	props: {
		text: {},
		href: {
			default: '#'
		},
		active: {},
		preserveState: {
            type: Boolean,
            default: true
        },
        preserveScroll: {
            type: Boolean,
            default: true
        }
	},

	components: {
		InertiaLink
	},

	computed: {
		computedTabClass() {
			return {
				"tab-active": this.active
			}
		}
	}
}
</script>
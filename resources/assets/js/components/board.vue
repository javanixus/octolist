<template lang="html">
	<div class="board">
		<header id="boardHeaderId">
			<div class="boardHeader">
				<nav class="boardHeader__Navigation">
					navigation
				</nav>
			</div>
		</header>
		<div class="boardWrapper">
			<div class="boardWrapper__Main">
				<kanban-board :stages="stages" :blocks="blocks" @update-block="updateBlock">
					<div v-for="block in blocks" :slot="block.id">
						<div>
							<strong>id:</strong> {{ block.id }}
						</div>
						<div>
							{{ block.title }}
						</div>
					</div>
				</kanban-board>
			</div>
		</div>
	</div>
</template>

<script>
	import {
		debounce
	} from 'lodash';
	
	export default {
		data() {
			return {
				stages: ['on-hold', 'in-progress', 'needs-review', 'approved', 'test1', 'test2'],
				blocks: [{
						id: 1,
						status: 'on-hold',
						title: 'Test',
					},
					{
						id: 2,
						status: 'needs-review',
						title: 'wado',
					},
				],
			}
		},
		methods: {
			updateBlock: debounce(function(id, status) {
				this.blocks.find(b => b.id === Number(id)).status = status;
			}, 500),
		},
	};
</script>

<style lang="sass">
	
</style>

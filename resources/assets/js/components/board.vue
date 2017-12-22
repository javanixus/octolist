<template lang="html">
	<div id="board">
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
</template>

<script>
	export default {
		data() {
			return {
				stages: ['on-hold', 'in-progress', 'needs-review', 'approved'],
				blocks: [{
					id: 1,
					status: 'on-hold',
					title: 'Test',
				}, ],
			}
		}
	};
</script>

<style lang="sass">
	
</style>

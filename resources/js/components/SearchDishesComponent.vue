<template>
    <div>
        <h1 class="text-2xl font-bold mb-4">Dishes</h1>
        <input type="text" v-model="search" placeholder="Search dishes..." class="mb-4 p-2 border rounded" />
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Name</th>
                    <th class="py-2">Description</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="dish in dishes" :key="dish.id">
                    <td class="py-2">{{ dish.name }}</td>
                    <td class="py-2">{{ dish.description }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup lang="ts">
import { computed, ref, watch } from 'vue';
import { DishItem } from '@/models/dish';

interface Props {
    dishes: DishItem[]
    search: string | null,
}


const props = withDefaults(
    defineProps<Props>(),
    {
        dishes: () => [],
        search: ""
    }
);

const search = ref(props.search);
const dishes = ref(props.dishes)

watch(search, (searchItem) => {
    // .get("/dishes", { search: searchItem }, {
    //     preserveState: true,
    //     replace: true,
    //     only: ['dishes'],
    // });
});

const filteredDishes = computed(() => {

})




</script>
<template>
    <div>
        <h1 class="text-2xl font-bold mb-4">Dishes</h1>
        <input type="text" v-model="filter" @input="filterDishes" placeholder="Search dishes..."
            class="mb-4 p-2 border rounded" />
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Name</th>
                    <th class="py-2">Description</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="dish in filteredDishes" :key="dish.id">
                    <td class="py-2">{{ dish.name }}</td>
                    <td class="py-2">{{ dish.description }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup lang="ts">
import { computed, ref, watch } from 'vue';
import { router } from "@inertiajs/vue3"
import { DishItem } from '@/Models/Dish';

interface Props {
    dishes: DishItem[]
    filter: string,
}

const props = withDefaults(
    defineProps<Props>(),
    {
        dishes: () => [],
        filter: ""
    }
);

const filter = ref(props.filter)
const dishes = ref(props.dishes);

const filterDishes = () => {
    router.get(route('dishes.index'), { data: filter.value }, {
        preserveState: true,
        replace: true,
    });
};

const filteredDishes = computed(() => {
    return dishes.value.filter(dish =>
        dish.name.toLowerCase().includes(filter.value.toLowerCase()) ||
        dish.description.toLowerCase().includes(filter.value.toLowerCase())
    );
});

watch(() => props.dishes, (newDishes) => {
    console.log(newDishes);
    dishes.value = newDishes;
});
</script>
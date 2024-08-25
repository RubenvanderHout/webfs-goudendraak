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
                <tr v-for="dish in filteredDishes">
                    <td class="py-2">{{ dish.name }}</td>
                    <td class="py-2">{{ dish.description }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup lang="ts">
import { computed, onMounted, ref, watch } from 'vue';
import { DishItem } from '@/models/dish';
import debounce from 'lodash/debounce';

const search = ref("");
const dishes = ref<DishItem[]>([]);

const fetchDishes = async (searchItem: string = '') => {
    try {
        const response = await fetch(`/dishes?search=${encodeURIComponent(searchItem)}`);
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        console.log(`before update dishes: ${JSON.stringify(dishes.value)}`);
        dishes.value = [...data.map((dish: DishItem) => ({
            ...dish,
            name: dish.name.toLowerCase(),
        }))];
        console.log(`after update dishes: ${JSON.stringify(dishes.value)}`);
    } catch (error) {
        console.error('Error fetching dishes:', error);
    }
};

const debouncedFetchDishes = debounce(fetchDishes, 500);

watch(search, (searchItem) => {
    debouncedFetchDishes(searchItem);
});

onMounted(() => {
    fetchDishes();
});

const filteredDishes = computed(() => {
    return dishes.value;
});
</script>
<template>
    <div class="mt-4">
        <nav>
            <ul class="flex justify-center">
                <li v-for="link in links" :key="link.url" :class="{ 'ml-1': link.url }">
                    <inertia-link v-if="link.url" :href="link.url" class="px-3 py-1 border rounded"
                        :class="{ 'bg-gray-300': link.active }">
                        {{ link.label }}
                    </inertia-link>
                    <span v-else class="px-3 py-1 border rounded text-gray-500">
                        {{ link.label }}
                    </span>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script setup>
defineProps({
    links: Array,
});
</script>
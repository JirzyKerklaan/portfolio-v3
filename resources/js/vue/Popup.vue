<script setup>
import {ref} from 'vue';

const showPopup = ref(false);

const togglePopup = () => {
    showPopup.value = !showPopup.value;
    document.body.classList.toggle('overflow-hidden');
}
</script>

<template>
    <slot
        name="target"
        :toggle-popup="togglePopup"
    />

    <div class="popover" :class="{
        'active': showPopup === true,
    }">
        <div class="popover-inner">
            <slot
                name="content"
                :toggle-popup="togglePopup"
            ></slot>
        </div>
    </div>
</template>

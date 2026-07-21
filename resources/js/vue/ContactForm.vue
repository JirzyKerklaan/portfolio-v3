<script setup>
import { useForm } from 'vee-validate';

const props = defineProps({
    endpoint: {
        type: String,
        required: true,
    },
});

const form = useForm({
    initialValues: {
        name: '',
        email: '',
        phone: '',
        message: '',
    }
});

const submit = (e) => {
    e.preventDefault();
}
</script>

<template>
    <form @submit="submit()">
        <fieldset>
            <div>
                <label for="name">Naam: </label>
                <input type="text" id="name" v-model="form.values.name" />
            </div>

            <div>
                <label for="name">Email: </label>
                <input type="text" id="email" v-model="form.values.email" />
            </div>

            <div>
                <label for="name">Telefoonnummer: </label>
                <input type="text" id="phone" v-model="form.values.phone" />
            </div>

            <div>
                <label for="message">Bericht: </label>
                <textarea id="message" rows="6" v-model="form.values.message"></textarea>
            </div>
        </fieldset>

        <input class="btn" type="submit" value="Submit">
    </form>
</template>

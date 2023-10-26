<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import { useForm, Head, Link } from "@inertiajs/vue3";
import InputText from "primevue/inputtext";
import InputNumber from "primevue/inputnumber";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps(["sorvete"]);
const form = useForm({
    sabor: props.sorvete.sabor,
    preco: props.sorvete.preco,
});
</script>

<template>
    <Head title="Editando sorvete" />
    <AuthenticatedLayout>
        <form @submit.prevent="form.put(route('sorvetes.update', sorvete.id))">
            <div class="flex items-center justify-center">
                <div
                    class="flex flex-col gap-2 bg-white rounded-md shadow-sm p-4"
                >
                    <Link :href="route('sorvetes.index')">
                        <i class="pi pi-chevron-left"></i>
                    </Link>
                    <label for="sabor">Sabor</label>
                    <InputText id="sabor" v-model="form.sabor" />
                    <InputError :message="form.errors.sabor" />
                    <label for="preco">Preço</label>
                    <InputNumber
                        id="preco"
                        v-model="form.preco"
                        inputId="currency-brl"
                        mode="currency"
                        currency="BRL"
                        locale="pt-BR"
                    />
                    <InputError :message="form.errors.preco" />
                    <PrimaryButton>Atualizar</PrimaryButton>
                </div>
            </div>
        </form>
    </AuthenticatedLayout>
</template>

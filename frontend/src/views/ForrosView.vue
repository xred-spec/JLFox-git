<script setup lang="ts">
import GenericContainer from '@/components/GenericContainer.vue';
import SubPageToogle from '@/components/SubPageToogle.vue';
import PageTitle from '@/components/PageTitle.vue';
</script>

<template>
    <GenericContainer>
        <template #content>
            <SubPageToogle>
                <PageTitle name="Forros" />


            </SubPageToogle>
        </template>
    </GenericContainer>
</template>
<template>
    <div class="flex flex-col size-full">
        <slot/>
        <slot name="content" class="size-full flex justify-center items-start overflow-auto">
            <slot />
        </slot>
    </div>
</template>
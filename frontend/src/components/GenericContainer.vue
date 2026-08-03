<template>
    <div class="flex flex-col size-full overflow-hidden">
        <slot/>
        
        <div class="flex-1 min-h-0 min-w-0 overflow-y-auto flex-col justify-start items-center">
            <slot name="content">
                <slot />
            </slot>
        </div>
    </div>
</template>
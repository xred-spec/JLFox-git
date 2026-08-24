<template>
    <div class="flex flex-col size-full overflow-hidden">
        <slot name="pageToggle"/>
        
        <div class="flex flex-1 min-h-0 min-w-0 w-full flex-col justify-between items-center">
            <div v-if="$slots.header" class="w-full flex justify-between">
                <slot name="header" />
            </div>


            <div v-if="$slots.content" class="flex w-full flex-1 min-h-0 flex-col overflow-y-auto">
                <slot name="content" />
            </div>    
            
            <div v-if="$slots.pagination" class="flex shrink-0 justify-center py-2 z-99 w-full">
                <slot name="pagination" />
            </div>

        </div>
    </div>
</template>
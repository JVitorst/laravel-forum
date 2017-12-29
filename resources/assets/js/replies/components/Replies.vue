<template>
<div>

    <div class="card">
        <div class="card-content">
            <span class="card-title">
                Martins {{replied}}
            </span>

            <blockquote>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores blanditiis illo impedit laboriosam possimus. Culpa id impedit minus quo. Delectus hic illum, ipsam iste iusto laboriosam nemo numquam odit saepe?
            </blockquote>

        </div>
    </div>
    <div class="card">
        <div class="card-content">
            <span class="card-title">
                Martins {{replied}}
            </span>

            <blockquote>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores blanditiis illo impedit laboriosam possimus. Culpa id impedit minus quo. Delectus hic illum, ipsam iste iusto laboriosam nemo numquam odit saepe?
            </blockquote>

        </div>
    </div>
    <div class="card">
        <div class="card-content">
            <span class="card-title">
                Martins {{replied}}
            </span>

            <blockquote>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores blanditiis illo impedit laboriosam possimus. Culpa id impedit minus quo. Delectus hic illum, ipsam iste iusto laboriosam nemo numquam odit saepe?
            </blockquote>

        </div>
    </div>
    <div class="card grey lighten-3">
        <div class="card-content">
            <span class="card-title">{{reply}}</span>

            <form action="">
                <div class="input-field">
                    <textarea rows="10" class="materialize-textarea" :placeholder="yourAnswer">
                    </textarea>
                </div>
                <button type="submit" class="btn red accent-2" >{{send}}</button>
            </form>
        </div>
    </div>

</div>
</template>

<script>
    export default {
        props:[
            'replied',
            'reply',
            'yourAnswer',
            'send'
        ]
    }
</script>

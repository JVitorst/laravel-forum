<template>
    <div class="card">
        <div class="card-content">
            <span class="card-title"> - {{title}} - </span>

            <table>
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{threads}}</th>
                    <th>{{replies}}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Delectus deserunt ducimus ea eius eligendi est facere ipsa iusto minus nulla quas quisquam rem repellendus reprehenderit suscipit veritatis, voluptatum? Vel, veniam.</td>
                    <td> At cum, doloremque facere id nostrum obcaecati omnis perferendis suscipit! Animi corporis cum facilis hic nemo odio officia, quasi repellendus reprehenderit tempore.</td>
                    <td>
                        <a href="/threads/1">{{open}}</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Asasasas deserunt ducimus ea eius eligendi est facere ipsa iusto minus nulla quas quisquam rem repellendus reprehenderit suscipit veritatis, voluptatum? Vel, veniam.</td>
                    <td> Joao, doloremque facere id nostrum obcaecati omnis perferendis suscipit! Animi corporis cum facilis hic nemo odio officia, quasi repellendus reprehenderit tempore.</td>
                    <td>
                        <a href="/threads/2">{{open}}</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</template>

<script>
    export default {
    props:[
        'title',
        'threads',
        'replies',
        'open'
    ]
    }
</script>

<!-- Copyright 1999-2016. Parallels IP Holdings GmbH. -->
<service-plan>
    <get>
        <filter>
            <?php foreach($planGuids as $guid): ?>
                <guid><?php echo $guid; ?></guid>
            <?php endforeach; ?>
        </filter>
    </get>
</service-plan>

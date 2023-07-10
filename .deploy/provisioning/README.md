## Compose commands

These commands can be used by developers to setup local dev environments without ansible.
All compose commands must be run from `/provisioning` directory. Compose runs containers without post-start procedures (e.g. start back-end horizon, start back-end cron). You can also use other app presets than `local`.

***Backend containers without swarm with local build actions***

`docker-compose -f docker-compose.yml -f backend/docker-compose.yml -f backend/docker-compose.local.yml up -d`

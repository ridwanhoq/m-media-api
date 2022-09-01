**events**

- id
- title
- starting_date | nullable
- ending_date | nullable
- is_public | default: 0
- is_protected | default: 0

**event_attendances**

- id
- event_id
- user_id

**events_acceessibilities**

- id
- event_id
- access_group_id

**access_groups**

- id
- name

**users**

- id
- access_group_id

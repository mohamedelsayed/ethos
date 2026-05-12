# Admission Form Amendments Plan

**Source:** Email from Reem Mansour (2026-04-21) — "Amendments in Admissions Application Form"
**Reference images:** A1, A2, B1, C1, C2, D1 in `/mnt/Work/Me/ethos/email-2026/`

Both repos share nearly identical code. Unless noted, each task applies to **both**:
- **ethos** → `/var/www/html/workspace/ethos`
- **north-gate** → `/var/www/html/workspace/north-gate`

---

## Legend

- [ ] = Not started
- [~] = In progress
- [x] = Done

**Files frequently referenced:**
- Frontend tab views: `app/views/elements/front/admissions_tabs/tab[1-5].ctp`
- Frontend JS: `app/webroot/js/front/admissions.js`
- Frontend CSS: `app/webroot/css/front/admissions.css`
- Backend controller (form submit): `app/controllers/page_controller.php` → `admissionsform()`
- Backend controller (admin/export): `app/controllers/requests_controller.php`
- Backend admin views: `app/views/requests/tab[1-5].ctp`
- Backend admin PDF/Excel export: `app/controllers/requests_controller.php` → `exportApplicationToExcel()` / PDF generation

---

## Section F: Structural / Layout Changes (do these FIRST)

### F1. Move "Has the pupil ever applied to Ethos International School?" to the very beginning of the form
- [x] **ethos**: Moved from `tab2.ctp` to top of `tab3.ctp` (now the first tab after F2 reorder). JS handler already existed.
- [x] **north-gate**: Added question at top of `tab3.ctp` with label "Has the pupil ever applied to NorthGate?". Added JS handler in `admissions.js`.
- [x] **Both**: Moved in backend admin views from `requests/tab2.ctp` to top of `requests/tab3.ctp`
- [x] Updated export logic in `requests_controller.php` — Excel headers/data and PDF section order

### F2. Reorder sections: Parents Information before Pupil's Information
- [x] **Both**: Reordered tabs: 1.Parents Info → 2.Pupil's Info → 3.Previous Schools → 4.Emergency → 5.Developmental History
- [x] Updated `admissions_form.php` to reorder the element includes (tab3 first)
- [x] Updated CSS classes: tab3→`tabIn0`, tab1→`tabIn1`, tab2→`tabIn2` (tab4/tab5 unchanged)
- [x] JS uses dynamic `".tabIn" + currentTab` — no changes needed
- [x] Updated backend admin `view.ctp` tab order (Parents Info first, displayed by default)
- [x] Updated `requests_controller.php` PDF export section order (Parents Info first)
- [ ] **Note:** The "Has applied to EIS" question (F1) should still be the very first thing — so it goes at the top of the new tab1 (Parents Information), or consider making it a standalone question above all tabs.

### F3. All notes across the form should be written in Red
- [x] **Both**: Changed `.input_description` color from `#151515` to `#ff0000` in `app/webroot/css/front/admissions.css`
- [x] All existing notes already use `.input_description` class
- [x] New notes added in subsequent tasks should use the same class

---

## Section A: Pupil's Information

### A1. Child's Name — Split into 6 separate fields (Image A1)
- [x] **Both**: Replaced single `child_name` input with 6 fields in `tab1.ctp` using `.input_row_3col` layout
- [x] Added red note above name fields
- [x] Added `.input_row_3col` CSS class for 3-column layout (both repos)
- [x] All 6 fields have `required_input` class — JS validation works automatically
- [x] Updated `page_controller.php`: title = concatenated EN name fields
- [x] Updated backend admin `requests/tab1.ctp` to display EN and AR names (with RTL for AR). Falls back to `title` for old records.
- [x] Updated `page_controller.php` validation: added 6 name fields to `$required_inputs_array`
- [x] Updated export logic in `requests_controller.php` — 6 name fields with fallback to title for old records

### A2. Nationality — Change to dropdown with all nationalities, default "Egyptian"
- [x] **Both**: Replaced text input with `<select>` dropdown in `tab1.ctp`
- [x] Added nationalities list to `app/config/constants.php` (150+ nationalities)
- [x] "Egyptian" set as default selected option
- [x] Backend admin view unchanged (displays value as-is)

### A3. Religion — Change to dropdown (Muslim/Christian/Other)
- [x] **Both**: Replaced text input with `<select>` dropdown in `tab1.ctp`
- [x] Options: (empty), Muslim, Christian, Other — no default
- [x] Added conditional `religion_other` text input (hidden by default)
- [x] Added JS handler using `show_textbox_if_value_selected` pattern
- [x] Updated backend admin view to show "Other" detail in parentheses
- [x] Added religions list to `app/config/constants.php`

### A4. Language Spoken at Home — Multi-select dropdown, default "Arabic" (Image A2)
- [x] **Both**: Replaced text input with `<select multiple>` using Select2 library
- [x] "Arabic" pre-selected as default
- [x] Added languages list to `app/config/constants.php` (35 languages)
- [x] Select2 CDN added to `admissions_form.php`; initialized in `admissions.js`
- [x] Updated backend admin view to handle array (implode with comma) with fallback for old string data
- [x] Updated `page_controller.php` `validate_required_data()` to handle array values

### A5. Remove "Are you applying for any siblings?"
- [x] **Both**: Removed `are_you_applying_for_any_siblings` select and details input from `tab1.ctp`
- [x] Removed JS handler in `admissions.js`
- [x] Removed from export logic (siblings applying column removed from Excel headers/data)
- [x] **ethos only**: Kept "Rukan Nursery" sibling question (not mentioned in email)

### A6. Add "Reason for applying" question
- [x] **Both**: Added textarea at end of Pupil's Information in `tab1.ctp` with `maxlength="500"`, `required_input` class, red note "Maximum 500 characters"
- [x] Added to backend admin view (`requests/tab1.ctp`)
- [x] Added to export logic

---

## Section B: Previous School(s) / Nursery

### B1. Add red note at the beginning of the section
- [x] **Both**: Added in `tab2.ctp` right after the section header:
  - Note (in red): "Please note that all the data mentioned below will be requested later to provide the required documents."
- [x] Uses the red `.input_description` class from F3

### B2. Replace previous schools table with new structure (Image B1)
- [x] **Both**: Removed the old 5×4 table in `tab2.ctp`
- [x] Replaced with new 6-column table (5 rows):
  1. **Year from** — text input
  2. **Year to** — text input
  3. **Name of Previous School / Nursery** — text input
  4. **Curriculum Followed** — dropdown (British, IB, American, National, French, German, Skipped this year, Homeschooling, Others)
  5. **Country** — dropdown (list of countries), default "Egypt"
  6. **Reason for leaving** — dropdown (6 options)
- [x] Updated field names to `prev_school_[field]_[row]` pattern
- [x] Added dropdown data arrays to `constants.php` (curriculums, countries, reasons_for_leaving)
- [x] Updated JS `year_group_applying_to_input` handler for new field names
- [x] Updated backend admin `tab2.ctp` with backwards compatibility (new fields + old fields fallback)
- [x] Updated export logic in `requests_controller.php`

### B3. Remove "Has the pupil ever skipped a year?"
- [x] **Both**: Removed `has_the_pupil_ever_skipped_year` select and details input from frontend `tab2.ctp`
- [x] Removed JS handler in `admissions.js`
- [x] Removed from backend admin `tab2.ctp` (both repos)
- [x] Updated export logic

### B4. Add "Current school reference" question
- [x] **Both**: Added in frontend `tab2.ctp` after the previous schools table:
  - Label: "For the current school reference, please provide us with a name and email address"
  - Two input fields: `school_reference_name` (text), `school_reference_email` (email)
- [x] Added to backend admin `tab2.ctp` (both repos)
- [x] Added to export logic

---

## Section C: Parents Information

### C1. Parent fields amendments (Image C1)

#### C1a. Add "Religion" dropdown for both parents
- [x] **Both**: Added "Religion" row to the parents table in `tab3.ctp`
- [x] Dropdown options: (Select), Muslim, Christian, Other — with conditional "Other" text input inline
- [x] Field names: `parent_religion_father`, `parent_religion_mother`, `parent_religion_father_other`, `parent_religion_mother_other`
- [x] Added JS handlers for "Other" show/hide
- [x] Added to backend admin view with "Other" detail display
- [x] Added to `page_controller.php` required validation

#### C1b. Add "Type of business" field
- [x] **Both**: Added after "Work Address" row in parents table
- [x] Field names: `parent_type_of_business_father` (required), `parent_type_of_business_mother` (optional)
- [x] Added to backend admin view (shown only for new records)

#### C1c. Add "Business Website" field
- [x] **Both**: Added after "Type of business" row
- [x] Field names: `parent_business_website_father`, `parent_business_website_mother` (both optional)
- [x] Added to backend admin view (shown only for new records)

#### C1d. Change parent Nationality to dropdown, default "Egyptian"
- [x] **Both**: Replaced text inputs for `parent_informations13` and `parent_informations14` with `<select>` dropdowns
- [x] Uses same nationalities list from `constants.php`
- [x] Default: "Egyptian"

#### C1e. Rename Education fields: Remove "Qualifications", keep "School" and "University"
- [x] **Both**: Removed the "Qualifications" row (parent_informations7, parent_informations8) from frontend form
- [x] Renamed "University" → "Education: University", "School" → "Education: School"
- [x] Backend admin views show "Qualifications" row only for old records that have the data
- [x] Removed 7, 8 from required validation in `page_controller.php`

#### C1f. Father's work info required, Mother's not required
- [x] **Both**: Removed `required_input` class from Mother's: Occupation (4), Employer (6), Work Address (26), Type of business
- [x] Father's work fields remain required
- [x] Updated `page_controller.php` validation: explicit field list instead of 1-24 loop, excluding 4, 6, 7, 8; added 25

### C2. Split parent ID attachments into 4 separate uploads
- [x] **Both**: Replaced 2 file uploads with 4 using `input_row_2col` layout:
  1. `father_id_front` — "Father National ID/ Passport (Front)"
  2. `father_id_back` — "Father National ID/ Passport (Back)"
  3. `mother_id_front` — "Mother National ID/ Passport (Front)"
  4. `mother_id_back` — "Mother National ID/ Passport (Back)"
- [x] Added `.input_row_2col` CSS class to both repos
- [x] File upload handling is generic (loops all files) — no controller changes needed
- [x] Backend admin views display all 6 possible file keys (4 new + 2 old for backwards compat)
- [x] Updated JS divorced handler to toggle `father_id_front`/`father_id_back` required instead of old `father_national_id`
- [x] Updated export logic

### C3. "If divorced, custody with" — Change to dropdown
- [x] **Both**: Replaced text input with `<select>` dropdown (Mother, Father, Other relatives)
- [x] Added conditional text input `custody_other_details` for "Other relatives"
- [x] Updated JS: `#custody_section` show/hide on divorce, `#custody_other_details` show/hide on "Other relatives"
- [x] Updated backend admin views to display custody + other details
- [x] Updated export logic

### C4. Add "Is there a step parent?" question (Image C2)
- [x] **Both**: Added after marital status section in `tab3.ctp` with Yes/No dropdown (default No)
- [x] If Yes, shows table with Name + Address columns, plus "Custodial parent Name" field
- [x] Field names: `is_step_parent`, `step_parent_name`, `step_parent_address`, `custodial_parent_name`
- [x] Added JS handler for show/hide
- [x] Added to backend admin views
- [x] Added to export logic

---

## Section D: Emergency Information

### D1. Change the emergency section note
- [x] **Both**: Replaced note in `tab4.ctp`:
  - Old: "In Case of emergency and the school is unable to contact the parents, Please Notify:"
  - New: "Please mention two contacts aside from the parents, i.e. relative, family friend, etc.."

---

## Section E: Developmental History

### E1. Update report upload condition (Image D1)
- [x] **Verified**: JS function `set_required_for_recent_report_if_needed` already checks all 5 radio groups + "Other" text field
- [x] Report upload becomes required when any answer is "Yes" or "Other" has text — matches the requirement
- [x] No changes needed

### E2. Add "Learning support services" question (Image D1)
- [x] **Both**: Added after medical history in `tab5.ctp`:
  - Question: "Has your child received any learning support services in a previous school / Nursery or centre?"
  - Yes/No dropdown (default No)
  - If Yes: textarea for details (max 500 chars) + file upload for "Support Learning Attachment"
  - Field names: `learning_support_services`, `learning_support_details`, `learning_support_attachment`
- [x] Added JS handler for show/hide `#learning_support_section`
- [x] Added to backend admin views (both repos)
- [x] File upload handled by existing generic upload loop — no controller changes needed
- [x] Added to export logic

---

## Summary: Files to modify per repo

### Frontend (both repos)
| File | Tasks |
|------|-------|
| `app/views/elements/front/admissions_tabs/tab1.ctp` | F1, A1, A2, A3, A4, A5, A6 |
| `app/views/elements/front/admissions_tabs/tab2.ctp` | F1, B1, B2, B3, B4 |
| `app/views/elements/front/admissions_tabs/tab3.ctp` | C1a-f, C2, C3, C4 |
| `app/views/elements/front/admissions_tabs/tab4.ctp` | D1 |
| `app/views/elements/front/admissions_tabs/tab5.ctp` | E1, E2 |
| `app/views/page/admissions_form.php` | F2 (reorder tabs) |
| `app/webroot/js/front/admissions.js` | F1, F2, A1, A3, A4, A5, B2, B3, C3, C4, E2 |
| `app/webroot/css/front/admissions.css` | F3, A1, A4, B2, C4 |

### Backend (both repos)
| File | Tasks |
|------|-------|
| `app/controllers/page_controller.php` | A1, A4, B2, C1f, C2, E2 (validation + file handling) |
| `app/controllers/requests_controller.php` | All tasks (export logic, admin display) |
| `app/views/requests/tab1.ctp` | F1, A1, A2, A3, A4, A5, A6 |
| `app/views/requests/tab2.ctp` | F1, B1, B2, B3, B4 |
| `app/views/requests/tab3.ctp` | C1a-f, C2, C3, C4 |
| `app/views/requests/tab4.ctp` | D1 |
| `app/views/requests/tab5.ctp` | E1, E2 |
| `app/views/requests/view.ctp` | F2 (reorder) |

### Ethos-only
| File | Tasks |
|------|-------|
| `app/views/elements/front/admissions_tabs/tab1.ctp` | Rukan sibling question — keep as-is (not mentioned in email) |

---

## Suggested Implementation Order

1. **F3** — Red notes CSS (quick, affects all subsequent work)
2. **F2** — Reorder sections (structural change, do early)
3. **F1** — Move "Has applied" question to top
4. **A1** — Child's name split (biggest pupil info change)
5. **A2** — Nationality dropdown
6. **A3** — Religion dropdown
7. **A4** — Language multi-select
8. **A5** — Remove siblings question
9. **A6** — Add reason for applying
10. **B1** — Red note for previous schools
11. **B2** — New previous schools table
12. **B3** — Remove skipped year question
13. **B4** — School reference fields
14. **C1a-f** — Parent field amendments
15. **C2** — Split parent ID uploads
16. **C3** — Custody dropdown
17. **C4** — Step parent question
18. **D1** — Emergency note text
19. **E1** — Report upload condition check
20. **E2** — Learning support question

For each task: update frontend view → JS → CSS → backend controller → admin view → export logic.

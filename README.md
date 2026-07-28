#  User Management & Status Toggle System

A dynamic web application built with **PHP**, **MySQL**, and **HTML/CSS** to manage users, insert data, toggle status, and clear database records.

---

##  Live Demo
Check out the live working application here:
 **[Click Here to Test the App](http://jumana515.free.nf/in.php)**

---

## Features & Logic Applied

1. **Database Integration:**
   * Connected PHP to MySQL database seamlessly using `mysqli`.

2. **User Insertion (HTML & PHP):**
   * Built a form to capture name and age, inserting records with a default `Status = 0`.

3. **Dynamic Status Toggle (The Main Task):**
   * Handled status toggling dynamically based on the unique **`ID`** of each record (not hardcoded to specific names).
   * Used an `UPDATE` query with conditional logic `IF(Status = 1, 0, 1)` to switch states (0 ↔ 1) with a single click.

4. **Creative Enhancements :**
   * **Visual Status Indicator:** Highlighted `1` in green (Active) and `0` in red (Inactive) for better readability.
   * **Clear All Data:** Added a styled button to safely reset/truncate the table with a JavaScript confirmation alert.
   * **Clean Layout:** Applied basic CSS for a neat and responsive table view.

---

## Tech Stack
* **HTML5 / CSS3**
* **PHP**
* **MySQL**

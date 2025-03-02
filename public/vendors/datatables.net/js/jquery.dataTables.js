@charset "UTF-8";
/*!
 * CoreUI Pro - Dashboard UI Kit
 * @version v2.1.7
 * @link https://coreui.io/pro/
 * Copyright (c) 2018 creativeLabs Łukasz Holeczek
 */
/*!
 * Bootstrap v4.3.1 (https://getbootstrap.com/)
 * Copyright 2011-2019 The Bootstrap Authors
 * Copyright 2011-2019 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */
:root {
  --blue: #20a8d8;
  --indigo: #6610f2;
  --purple: #6f42c1;
  --pink: #e83e8c;
  --red: #f86c6b;
  --orange: #f8cb00;
  --yellow: #ffc107;
  --green: #4dbd74;
  --teal: #20c997;
  --cyan: #17a2b8;
  --white: #fff;
  --gray: #73818f;
  --gray-dark: #2f353a;
  --light-blue: #63c2de;
  --primary: #20a8d8;
  --secondary: #c8ced3;
  --success: #4dbd74;
  --info: #63c2de;
  --warning: #ffc107;
  --danger: #f86c6b;
  --light: #f0f3f5;
  --dark: #2f353a;
  --breakpoint-xs: 0;
  --breakpoint-sm: 576px;
  --breakpoint-md: 768px;
  --breakpoint-lg: 992px;
  --breakpoint-xl: 1200px;
  --font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
}

*,
*::before,
*::after {
  box-sizing: border-box;
}

html {
  font-family: sans-serif;
  line-height: 1.15;
  -webkit-text-size-adjust: 100%;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}

article, aside, figcaption, figure, footer, header, hgroup, main, nav, section {
  display: block;
}

body {
  margin: 0;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  font-size: 0.875rem;
  font-weight: 400;
  line-height: 1.5;
  color: #23282c;
  text-align: left;
  background-color: #e4e5e6;
}

[tabindex="-1"]:focus {
  outline: 0 !important;
}

hr {
  box-sizing: content-box;
  height: 0;
  overflow: visible;
}

h1, h2, h3, h4, h5, h6 {
  margin-top: 0;
  margin-bottom: 0.5rem;
}

p {
  margin-top: 0;
  margin-bottom: 1rem;
}

abbr[title],
abbr[data-original-title] {
  text-decoration: underline;
  -webkit-text-decoration: underline dotted;
  text-decoration: underline dotted;
  cursor: help;
  border-bottom: 0;
  -webkit-text-decoration-skip-ink: none;
  text-decoration-skip-ink: none;
}

address {
  margin-bottom: 1rem;
  font-style: normal;
  line-height: inherit;
}

ol,
ul,
dl {
  margin-top: 0;
  margin-bottom: 1rem;
}

ol ol,
ul ul,
ol ul,
ul ol {
  margin-bottom: 0;
}

dt {
  font-weight: 700;
}

dd {
  margin-bottom: .5rem;
  margin-left: 0;
}

blockquote {
  margin: 0 0 1rem;
}

b,
strong {
  font-weight: bolder;
}

small {
  font-size: 80%;
}

sub,
sup {
  position: relative;
  font-size: 75%;
  line-height: 0;
  vertical-align: baseline;
}

sub {
  bottom: -.25em;
}

sup {
  top: -.5em;
}

a {
  color: #20a8d8;
  text-decoration: none;
  background-color: transparent;
}

a:hover {
  color: #167495;
  text-decoration: underline;
}

a:not([href]):not([tabindex]) {
  color: inherit;
  text-decoration: none;
}

a:not([href]):not([tabindex]):hover, a:not([href]):not([tabindex]):focus {
  color: inherit;
  text-decoration: none;
}

a:not([href]):not([tabindex]):focus {
  outline: 0;
}

pre,
code,
kbd,
samp {
  font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
  font-size: 1em;
}

pre {
  margin-top: 0;
  margin-bottom: 1rem;
  overflow: auto;
}

figure {
  margin: 0 0 1rem;
}

img {
  vertical-align: middle;
  border-style: none;
}

svg {
  overflow: hidden;
  vertical-align: middle;
}

table {
  border-collapse: collapse;
}

caption {
  padding-top: 0.75rem;
  padding-bottom: 0.75rem;
  color: #73818f;
  text-align: left;
  caption-side: bottom;
}

th {
  text-align: inherit;
}

label {
  display: inline-block;
  margin-bottom: 0.5rem;
}

button {
  border-radius: 0;
}

button:focus {
  outline: 1px dotted;
  outline: 5px auto -webkit-focus-ring-color;
}

input,
button,
select,
optgroup,
textarea {
  margin: 0;
  font-family: inherit;
  font-size: inherit;
  line-height: inherit;
}

button,
input {
  overflow: visible;
}

button,
select {
  text-transform: none;
}

select {
  word-wrap: normal;
}

button,
[type="button"],
[type="reset"],
[type="submit"] {
  -webkit-appearance: button;
}

button:not(:disabled),
[type="button"]:not(:disabled),
[type="reset"]:not(:disabled),
[type="submit"]:not(:disabled) {
  cursor: pointer;
}

button::-moz-focus-inner,
[type="button"]::-moz-focus-inner,
[type="reset"]::-moz-focus-inner,
[type="submit"]::-moz-focus-inner {
  padding: 0;
  border-style: none;
}

input[type="radio"],
input[type="checkbox"] {
  box-sizing: border-box;
  padding: 0;
}

input[type="date"],
input[type="time"],
input[type="datetime-local"],
input[type="month"] {
  -webkit-appearance: listbox;
}

textarea {
  overflow: auto;
  resize: vertical;
}

fieldset {
  min-width: 0;
  padding: 0;
  margin: 0;
  border: 0;
}

legend {
  display: block;
  width: 100%;
  max-width: 100%;
  padding: 0;
  margin-bottom: .5rem;
  font-size: 1.5rem;
  line-height: inherit;
  color: inherit;
  white-space: normal;
}

progress {
  vertical-align: baseline;
}

[type="number"]::-webkit-inner-spin-button,
[type="number"]::-webkit-outer-spin-button {
  height: auto;
}

[type="search"] {
  outline-offset: -2px;
  -webkit-appearance: none;
}

[type="search"]::-webkit-search-decoration {
  -webkit-appearance: none;
}

::-webkit-file-upload-button {
  font: inherit;
  -webkit-appearance: button;
}

output {
  display: inline-block;
}

summary {
  display: list-item;
  cursor: pointer;
}

template {
  display: none;
}

[hidden] {
  display: none !important;
}

h1, h2, h3, h4, h5, h6,
.h1, .h2, .h3, .h4, .h5, .h6 {
  margin-bottom: 0.5rem;
  font-weight: 500;
  line-height: 1.2;
}

h1, .h1 {
  font-size: 2.1875rem;
}

h2, .h2 {
  font-size: 1.75rem;
}

h3, .h3 {
  font-size: 1.53125rem;
}

h4, .h4 {
  font-size: 1.3125rem;
}

h5, .h5 {
  font-size: 1.09375rem;
}

h6, .h6 {
  font-size: 0.875rem;
}

.lead {
  font-size: 1.09375rem;
  font-weight: 300;
}

.display-1 {
  font-size: 6rem;
  font-weight: 300;
  line-height: 1.2;
}

.display-2 {
  font-size: 5.5rem;
  font-weight: 300;
  line-height: 1.2;
}

.display-3 {
  font-size: 4.5rem;
  font-weight: 300;
  line-height: 1.2;
}

.display-4 {
  font-size: 3.5rem;
  font-weight: 300;
  line-height: 1.2;
}

hr {
  margin-top: 1rem;
  margin-bottom: 1rem;
  border: 0;
  border-top: 1px solid rgba(0, 0, 0, 0.1);
}

small,
.small {
  font-size: 80%;
  font-weight: 400;
}

mark,
.mark {
  padding: 0.2em;
  background-color: #fcf8e3;
}

.list-unstyled {
  padding-left: 0;
  list-style: none;
}

.list-inline {
  padding-left: 0;
  list-style: none;
}

.list-inline-item {
  display: inline-block;
}

.list-inline-item:not(:last-child) {
  margin-right: 0.5rem;
}

.initialism {
  font-size: 90%;
  text-transform: uppercase;
}

.blockquote {
  margin-bottom: 1rem;
  font-size: 1.09375rem;
}

.blockquote-footer {
  display: block;
  font-size: 80%;
  color: #73818f;
}

.blockquote-footer::before {
  content: "\2014\00A0";
}

.img-fluid {
  max-width: 100%;
  height: auto;
}

.img-thumbnail {
  padding: 0.25rem;
  background-color: #e4e5e6;
  border: 1px solid #c8ced3;
  border-radius: 0.25rem;
  max-width: 100%;
  height: auto;
}

.figure {
  display: inline-block;
}

.figure-img {
  margin-bottom: 0.5rem;
  line-height: 1;
}

.figure-caption {
  font-size: 90%;
  color: #73818f;
}

code {
  font-size: 87.5%;
  color: #e83e8c;
  word-break: break-word;
}

a > code {
  color: inherit;
}

kbd {
  padding: 0.2rem 0.4rem;
  font-size: 87.5%;
  color: #fff;
  background-color: #23282c;
  border-radius: 0.2rem;
}

kbd kbd {
  padding: 0;
  font-size: 100%;
  font-weight: 700;
}

pre {
  display: block;
  font-size: 87.5%;
  color: #23282c;
}

pre code {
  font-size: inherit;
  color: inherit;
  word-break: normal;
}

.pre-scrollable {
  max-height: 340px;
  overflow-y: scroll;
}

.container {
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}

@media (min-width: 576px) {
  .container {
    max-width: 540px;
  }
}

@media (min-width: 768px) {
  .container {
    max-width: 720px;
  }
}

@media (min-width: 992px) {
  .container {
    max-width: 960px;
  }
}

@media (min-width: 1200px) {
  .container {
    max-width: 1140px;
  }
}

.container-fluid {
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}

.row {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  margin-right: -15px;
  margin-left: -15px;
}

.no-gutters {
  margin-right: 0;
  margin-left: 0;
}

.no-gutters > .col,
.no-gutters > [class*="col-"] {
  padding-right: 0;
  padding-left: 0;
}

.col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col,
.col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm,
.col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md,
.col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg,
.col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl,
.col-xl-auto {
  position: relative;
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
}

.col {
  -ms-flex-preferred-size: 0;
  flex-basis: 0;
  -ms-flex-positive: 1;
  flex-grow: 1;
  max-width: 100%;
}

.col-auto {
  -ms-flex: 0 0 auto;
  flex: 0 0 auto;
  width: auto;
  max-width: 100%;
}

.col-1 {
  -ms-flex: 0 0 8.333333%;
  flex: 0 0 8.333333%;
  max-width: 8.333333%;
}

.col-2 {
  -ms-flex: 0 0 16.666667%;
  flex: 0 0 16.666667%;
  max-width: 16.666667%;
}

.col-3 {
  -ms-flex: 0 0 25%;
  flex: 0 0 25%;
  max-width: 25%;
}

.col-4 {
  -ms-flex: 0 0 33.333333%;
  flex: 0 0 33.333333%;
  max-width: 33.333333%;
}

.col-5 {
  -ms-flex: 0 0 41.666667%;
  flex: 0 0 41.666667%;
  max-width: 41.666667%;
}

.col-6 {
  -ms-flex: 0 0 50%;
  flex: 0 0 50%;
  max-width: 50%;
}

.col-7 {
  -ms-flex: 0 0 58.333333%;
  flex: 0 0 58.333333%;
  max-width: 58.333333%;
}

.col-8 {
  -ms-flex: 0 0 66.666667%;
  flex: 0 0 66.666667%;
  max-width: 66.666667%;
}

.col-9 {
  -ms-flex: 0 0 75%;
  flex: 0 0 75%;
  max-width: 75%;
}

.col-10 {
  -ms-flex: 0 0 83.333333%;
  flex: 0 0 83.333333%;
  max-width: 83.333333%;
}

.col-11 {
  -ms-flex: 0 0 91.666667%;
  flex: 0 0 91.666667%;
  max-width: 91.666667%;
}

.col-12 {
  -ms-flex: 0 0 100%;
  flex: 0 0 100%;
  max-width: 100%;
}

.order-first {
  -ms-flex-order: -1;
  order: -1;
}

.order-last {
  -ms-flex-order: 13;
  order: 13;
}

.order-0 {
  -ms-flex-order: 0;
  order: 0;
}

.order-1 {
  -ms-flex-order: 1;
  order: 1;
}

.order-2 {
  -ms-flex-order: 2;
  order: 2;
}

.order-3 {
  -ms-flex-order: 3;
  order: 3;
}

.order-4 {
  -ms-flex-order: 4;
  order: 4;
}

.order-5 {
  -ms-flex-order: 5;
  order: 5;
}

.order-6 {
  -ms-flex-order: 6;
  order: 6;
}

.order-7 {
  -ms-flex-order: 7;
  order: 7;
}

.order-8 {
  -ms-flex-order: 8;
  order: 8;
}

.order-9 {
  -ms-flex-order: 9;
  order: 9;
}

.order-10 {
  -ms-flex-order: 10;
  order: 10;
}

.order-11 {
  -ms-flex-order: 11;
  order: 11;
}

.order-12 {
  -ms-flex-order: 12;
  order: 12;
}

.offset-1 {
  margin-left: 8.333333%;
}

.offset-2 {
  margin-left: 16.666667%;
}

.offset-3 {
  margin-left: 25%;
}

.offset-4 {
  margin-left: 33.333333%;
}

.offset-5 {
  margin-left: 41.666667%;
}

.offset-6 {
  margin-left: 50%;
}

.offset-7 {
  margin-left: 58.333333%;
}

.offset-8 {
  margin-left: 66.666667%;
}

.offset-9 {
  margin-left: 75%;
}

.offset-10 {
  margin-left: 83.333333%;
}

.offset-11 {
  margin-left: 91.666667%;
}

@media (min-width: 576px) {
  .col-sm {
    -ms-flex-preferred-size: 0;
    flex-basis: 0;
    -ms-flex-positive: 1;
    flex-grow: 1;
    max-width: 100%;
  }
  .col-sm-auto {
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    width: auto;
    max-width: 100%;
  }
  .col-sm-1 {
    -ms-flex: 0 0 8.333333%;
    flex: 0 0 8.333333%;
    max-width: 8.333333%;
  }
  .col-sm-2 {
    -ms-flex: 0 0 16.666667%;
    flex: 0 0 16.666667%;
    max-width: 16.666667%;
  }
  .col-sm-3 {
    -ms-flex: 0 0 25%;
    flex: 0 0 25%;
    max-width: 25%;
  }
  .col-sm-4 {
    -ms-flex: 0 0 33.333333%;
    flex: 0 0 33.333333%;
    max-width: 33.333333%;
  }
  .col-sm-5 {
    -ms-flex: 0 0 41.666667%;
    flex: 0 0 41.666667%;
    max-width: 41.666667%;
  }
  .col-sm-6 {
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
  }
  .col-sm-7 {
    -ms-flex: 0 0 58.333333%;
    flex: 0 0 58.333333%;
    max-width: 58.333333%;
  }
  .col-sm-8 {
    -ms-flex: 0 0 66.666667%;
    flex: 0 0 66.666667%;
    max-width: 66.666667%;
  }
  .col-sm-9 {
    -ms-flex: 0 0 75%;
    flex: 0 0 75%;
    max-width: 75%;
  }
  .col-sm-10 {
    -ms-flex: 0 0 83.333333%;
    flex: 0 0 83.333333%;
    max-width: 83.333333%;
  }
  .col-sm-11 {
    -ms-flex: 0 0 91.666667%;
    flex: 0 0 91.666667%;
    max-width: 91.666667%;
  }
  .col-sm-12 {
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
  }
  .order-sm-first {
    -ms-flex-order: -1;
    order: -1;
  }
  .order-sm-last {
    -ms-flex-order: 13;
    order: 13;
  }
  .order-sm-0 {
    -ms-flex-order: 0;
    order: 0;
  }
  .order-sm-1 {
    -ms-flex-order: 1;
    order: 1;
  }
  .order-sm-2 {
    -ms-flex-order: 2;
    order: 2;
  }
  .order-sm-3 {
    -ms-flex-order: 3;
    order: 3;
  }
  .order-sm-4 {
    -ms-flex-order: 4;
    order: 4;
  }
  .order-sm-5 {
    -ms-flex-order: 5;
    order: 5;
  }
  .order-sm-6 {
    -ms-flex-order: 6;
    order: 6;
  }
  .order-sm-7 {
    -ms-flex-order: 7;
    order: 7;
  }
  .order-sm-8 {
    -ms-flex-order: 8;
    order: 8;
  }
  .order-sm-9 {
    -ms-flex-order: 9;
    order: 9;
  }
  .order-sm-10 {
    -ms-flex-order: 10;
    order: 10;
  }
  .order-sm-11 {
    -ms-flex-order: 11;
    order: 11;
  }
  .order-sm-12 {
    -ms-flex-order: 12;
    order: 12;
  }
  .offset-sm-0 {
    margin-left: 0;
  }
  .offset-sm-1 {
    margin-left: 8.333333%;
  }
  .offset-sm-2 {
    margin-left: 16.666667%;
  }
  .offset-sm-3 {
    margin-left: 25%;
  }
  .offset-sm-4 {
    margin-left: 33.333333%;
  }
  .offset-sm-5 {
    margin-left: 41.666667%;
  }
  .offset-sm-6 {
    margin-left: 50%;
  }
  .offset-sm-7 {
    margin-left: 58.333333%;
  }
  .offset-sm-8 {
    margin-left: 66.666667%;
  }
  .offset-sm-9 {
    margin-left: 75%;
  }
  .offset-sm-10 {
    margin-left: 83.333333%;
  }
  .offset-sm-11 {
    margin-left: 91.666667%;
  }
}

@media (min-width: 768px) {
  .col-md {
    -ms-flex-preferred-size: 0;
    flex-basis: 0;
    -ms-flex-positive: 1;
    flex-grow: 1;
    max-width: 100%;
  }
  .col-md-auto {
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    width: auto;
    max-width: 100%;
  }
  .col-md-1 {
    -ms-flex: 0 0 8.333333%;
    flex: 0 0 8.333333%;
    max-width: 8.333333%;
  }
  .col-md-2 {
    -ms-flex: 0 0 16.666667%;
    flex: 0 0 16.666667%;
    max-width: 16.666667%;
  }
  .col-md-3 {
    -ms-flex: 0 0 25%;
    flex: 0 0 25%;
    max-width: 25%;
  }
  .col-md-4 {
    -ms-flex: 0 0 33.333333%;
    flex: 0 0 33.333333%;
    max-width: 33.333333%;
  }
  .col-md-5 {
    -ms-flex: 0 0 41.666667%;
    flex: 0 0 41.666667%;
    max-width: 41.666667%;
  }
  .col-md-6 {
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
  }
  .col-md-7 {
    -ms-flex: 0 0 58.333333%;
    flex: 0 0 58.333333%;
    max-width: 58.333333%;
  }
  .col-md-8 {
    -ms-flex: 0 0 66.666667%;
    flex: 0 0 66.666667%;
    max-width: 66.666667%;
  }
  .col-md-9 {
    -ms-flex: 0 0 75%;
    flex: 0 0 75%;
    max-width: 75%;
  }
  .col-md-10 {
    -ms-flex: 0 0 83.333333%;
    flex: 0 0 83.333333%;
    max-width: 83.333333%;
  }
  .col-md-11 {
    -ms-flex: 0 0 91.666667%;
    flex: 0 0 91.666667%;
    max-width: 91.666667%;
  }
  .col-md-12 {
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
  }
  .order-md-first {
    -ms-flex-order: -1;
    order: -1;
  }
  .order-md-last {
    -ms-flex-order: 13;
    order: 13;
  }
  .order-md-0 {
    -ms-flex-order: 0;
    order: 0;
  }
  .order-md-1 {
    -ms-flex-order: 1;
    order: 1;
  }
  .order-md-2 {
    -ms-flex-order: 2;
    order: 2;
  }
  .order-md-3 {
    -ms-flex-order: 3;
    order: 3;
  }
  .order-md-4 {
    -ms-flex-order: 4;
    order: 4;
  }
  .order-md-5 {
    -ms-flex-order: 5;
    order: 5;
  }
  .order-md-6 {
    -ms-flex-order: 6;
    order: 6;
  }
  .order-md-7 {
    -ms-flex-order: 7;
    order: 7;
  }
  .order-md-8 {
    -ms-flex-order: 8;
    order: 8;
  }
  .order-md-9 {
    -ms-flex-order: 9;
    order: 9;
  }
  .order-md-10 {
    -ms-flex-order: 10;
    order: 10;
  }
  .order-md-11 {
    -ms-flex-order: 11;
    order: 11;
  }
  .order-md-12 {
    -ms-flex-order: 12;
    order: 12;
  }
  .offset-md-0 {
    margin-left: 0;
  }
  .offset-md-1 {
    margin-left: 8.333333%;
  }
  .offset-md-2 {
    margin-left: 16.666667%;
  }
  .offset-md-3 {
    margin-left: 25%;
  }
  .offset-md-4 {
    margin-left: 33.333333%;
  }
  .offset-md-5 {
    margin-left: 41.666667%;
  }
  .offset-md-6 {
    margin-left: 50%;
  }
  .offset-md-7 {
    margin-left: 58.333333%;
  }
  .offset-md-8 {
    margin-left: 66.666667%;
  }
  .offset-md-9 {
    margin-left: 75%;
  }
  .offset-md-10 {
    margin-left: 83.333333%;
  }
  .offset-md-11 {
    margin-left: 91.666667%;
  }
}

@media (min-width: 992px) {
  .col-lg {
    -ms-flex-preferred-size: 0;
    flex-basis: 0;
    -ms-flex-positive: 1;
    flex-grow: 1;
    max-width: 100%;
  }
  .col-lg-auto {
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    width: auto;
    max-width: 100%;
  }
  .col-lg-1 {
    -ms-flex: 0 0 8.333333%;
    flex: 0 0 8.333333%;
    max-width: 8.333333%;
  }
  .col-lg-2 {
    -ms-flex: 0 0 16.666667%;
    flex: 0 0 16.666667%;
    max-width: 16.666667%;
  }
  .col-lg-3 {
    -ms-flex: 0 0 25%;
    flex: 0 0 25%;
    max-width: 25%;
  }
  .col-lg-4 {
    -ms-flex: 0 0 33.333333%;
    flex: 0 0 33.333333%;
    max-width: 33.333333%;
  }
  .col-lg-5 {
    -ms-flex: 0 0 41.666667%;
    flex: 0 0 41.666667%;
    max-width: 41.666667%;
  }
  .col-lg-6 {
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
  }
  .col-lg-7 {
    -ms-flex: 0 0 58.333333%;
    flex: 0 0 58.333333%;
    max-width: 58.333333%;
  }
  .col-lg-8 {
    -ms-flex: 0 0 66.666667%;
    flex: 0 0 66.666667%;
    max-width: 66.666667%;
  }
  .col-lg-9 {
    -ms-flex: 0 0 75%;
    flex: 0 0 75%;
    max-width: 75%;
  }
  .col-lg-10 {
    -ms-flex: 0 0 83.333333%;
    flex: 0 0 83.333333%;
    max-width: 83.333333%;
  }
  .col-lg-11 {
    -ms-flex: 0 0 91.666667%;
    flex: 0 0 91.666667%;
    max-width: 91.666667%;
  }
  .col-lg-12 {
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
  }
  .order-lg-first {
    -ms-flex-order: -1;
    order: -1;
  }
  .order-lg-last {
    -ms-flex-order: 13;
    order: 13;
  }
  .order-lg-0 {
    -ms-flex-order: 0;
    order: 0;
  }
  .order-lg-1 {
    -ms-flex-order: 1;
    order: 1;
  }
  .order-lg-2 {
    -ms-flex-order: 2;
    order: 2;
  }
  .order-lg-3 {
    -ms-flex-order: 3;
    order: 3;
  }
  .order-lg-4 {
    -ms-flex-order: 4;
    order: 4;
  }
  .order-lg-5 {
    -ms-flex-order: 5;
    order: 5;
  }
  .order-lg-6 {
    -ms-flex-order: 6;
    order: 6;
  }
  .order-lg-7 {
    -ms-flex-order: 7;
    order: 7;
  }
  .order-lg-8 {
    -ms-flex-order: 8;
    order: 8;
  }
  .order-lg-9 {
    -ms-flex-order: 9;
    order: 9;
  }
  .order-lg-10 {
    -ms-flex-order: 10;
    order: 10;
  }
  .order-lg-11 {
    -ms-flex-order: 11;
    order: 11;
  }
  .order-lg-12 {
    -ms-flex-order: 12;
    order: 12;
  }
  .offset-lg-0 {
    margin-left: 0;
  }
  .offset-lg-1 {
    margin-left: 8.333333%;
  }
  .offset-lg-2 {
    margin-left: 16.666667%;
  }
  .offset-lg-3 {
    margin-left: 25%;
  }
  .offset-lg-4 {
    margin-left: 33.333333%;
  }
  .offset-lg-5 {
    margin-left: 41.666667%;
  }
  .offset-lg-6 {
    margin-left: 50%;
  }
  .offset-lg-7 {
    margin-left: 58.333333%;
  }
  .offset-lg-8 {
    margin-left: 66.666667%;
  }
  .offset-lg-9 {
    margin-left: 75%;
  }
  .offset-lg-10 {
    margin-left: 83.333333%;
  }
  .offset-lg-11 {
    margin-left: 91.666667%;
  }
}

@media (min-width: 1200px) {
  .col-xl {
    -ms-flex-preferred-size: 0;
    flex-basis: 0;
    -ms-flex-positive: 1;
    flex-grow: 1;
    max-width: 100%;
  }
  .col-xl-auto {
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    width: auto;
    max-width: 100%;
  }
  .col-xl-1 {
    -ms-flex: 0 0 8.333333%;
    flex: 0 0 8.333333%;
    max-width: 8.333333%;
  }
  .col-xl-2 {
    -ms-flex: 0 0 16.666667%;
    flex: 0 0 16.666667%;
    max-width: 16.666667%;
  }
  .col-xl-3 {
    -ms-flex: 0 0 25%;
    flex: 0 0 25%;
    max-width: 25%;
  }
  .col-xl-4 {
    -ms-flex: 0 0 33.333333%;
    flex: 0 0 33.333333%;
    max-width: 33.333333%;
  }
  .col-xl-5 {
    -ms-flex: 0 0 41.666667%;
    flex: 0 0 41.666667%;
    max-width: 41.666667%;
  }
  .col-xl-6 {
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
  }
  .col-xl-7 {
    -ms-flex: 0 0 58.333333%;
    flex: 0 0 58.333333%;
    max-width: 58.333333%;
  }
  .col-xl-8 {
    -ms-flex: 0 0 66.666667%;
    flex: 0 0 66.666667%;
    max-width: 66.666667%;
  }
  .col-xl-9 {
    -ms-flex: 0 0 75%;
    flex: 0 0 75%;
    max-width: 75%;
  }
  .col-xl-10 {
    -ms-flex: 0 0 83.333333%;
    flex: 0 0 83.333333%;
    max-width: 83.333333%;
  }
  .col-xl-11 {
    -ms-flex: 0 0 91.666667%;
    flex: 0 0 91.666667%;
    max-width: 91.666667%;
  }
  .col-xl-12 {
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
  }
  .order-xl-first {
    -ms-flex-order: -1;
    order: -1;
  }
  .order-xl-last {
    -ms-flex-order: 13;
    order: 13;
  }
  .order-xl-0 {
    -ms-flex-order: 0;
    order: 0;
  }
  .order-xl-1 {
    -ms-flex-order: 1;
    order: 1;
  }
  .order-xl-2 {
    -ms-flex-order: 2;
    order: 2;
  }
  .order-xl-3 {
    -ms-flex-order: 3;
    order: 3;
  }
  .order-xl-4 {
    -ms-flex-order: 4;
    order: 4;
  }
  .order-xl-5 {
    -ms-flex-order: 5;
    order: 5;
  }
  .order-xl-6 {
    -ms-flex-order: 6;
    order: 6;
  }
  .order-xl-7 {
    -ms-flex-order: 7;
    order: 7;
  }
  .order-xl-8 {
    -ms-flex-order: 8;
    order: 8;
  }
  .order-xl-9 {
    -ms-flex-order: 9;
    order: 9;
  }
  .order-xl-10 {
    -ms-flex-order: 10;
    order: 10;
  }
  .order-xl-11 {
    -ms-flex-order: 11;
    order: 11;
  }
  .order-xl-12 {
    -ms-flex-order: 12;
    order: 12;
  }
  .offset-xl-0 {
    margin-left: 0;
  }
  .offset-xl-1 {
    margin-left: 8.333333%;
  }
  .offset-xl-2 {
    margin-left: 16.666667%;
  }
  .offset-xl-3 {
    margin-left: 25%;
  }
  .offset-xl-4 {
    margin-left: 33.333333%;
  }
  .offset-xl-5 {
    margin-left: 41.666667%;
  }
  .offset-xl-6 {
    margin-left: 50%;
  }
  .offset-xl-7 {
    margin-left: 58.333333%;
  }
  .offset-xl-8 {
    margin-left: 66.666667%;
  }
  .offset-xl-9 {
    margin-left: 75%;
  }
  .offset-xl-10 {
    margin-left: 83.333333%;
  }
  .offset-xl-11 {
    margin-left: 91.666667%;
  }
}

.table {
  width: 100%;
  margin-bottom: 1rem;
  color: #23282c;
}

.table th,
.table td {
  padding: 0.75rem;
  vertical-align: top;
  border-top: 1px solid #c8ced3;
}

.table thead th {
  vertical-align: bottom;
  border-bottom: 2px solid #c8ced3;
}

.table tbody + tbody {
  border-top: 2px solid #c8ced3;
}

.table-sm th,
.table-sm td {
  padding: 0.3rem;
}

.table-bordered {
  border: 1px solid #c8ced3;
}

.table-bordered th,
.table-bordered td {
  border: 1px solid #c8ced3;
}

.table-bordered thead th,
.table-bordered thead td {
  border-bottom-width: 2px;
}

.table-borderless th,
.table-borderless td,
.table-borderless thead th,
.table-borderless tbody + tbody {
  border: 0;
}

.table-striped tbody tr:nth-of-type(odd) {
  background-color: rgba(0, 0, 0, 0.05);
}

.table-hover tbody tr:hover {
  color: #23282c;
  background-color: rgba(0, 0, 0, 0.075);
}

.table-primary,
.table-primary > th,
.table-primary > td {
  background-color: #c1e7f4;
}

.table-primary th,
.table-primary td,
.table-primary thead th,
.table-primary tbody + tbody {
  border-color: #8bd2eb;
}

.table-hover .table-primary:hover {
  background-color: #abdff0;
}

.table-hover .table-primary:hover > td,
.table-hover .table-primary:hover > th {
  background-color: #abdff0;
}

.table-secondary,
.table-secondary > th,
.table-secondary > td {
  background-color: #f0f1f3;
}

.table-secondary th,
.table-secondary td,
.table-secondary thead th,
.table-secondary tbody + tbody {
  border-color: #e2e6e8;
}

.table-hover .table-secondary:hover {
  background-color: #e2e4e8;
}

.table-hover .table-secondary:hover > td,
.table-hover .table-secondary:hover > th {
  background-color: #e2e4e8;
}

.table-success,
.table-success > th,
.table-success > td {
  background-color: #cdedd8;
}

.table-success th,
.table-success td,
.table-success thead th,
.table-success tbody + tbody {
  border-color: #a2ddb7;
}

.table-hover .table-success:hover {
  background-color: #bae6c9;
}

.table-hover .table-success:hover > td,
.table-hover .table-success:hover > th {
  background-color: #bae6c9;
}

.table-info,
.table-info > th,
.table-info > td {
  background-color: #d3eef6;
}

.table-info th,
.table-info td,
.table-info thead th,
.table-info tbody + tbody {
  border-color: #aedfee;
}

.table-hover .table-info:hover {
  background-color: #bee6f2;
}

.table-hover .table-info:hover > td,
.table-hover .table-info:hover > th {
  background-color: #bee6f2;
}

.table-warning,
.table-warning > th,
.table-warning > td {
  background-color: #ffeeba;
}

.table-warning th,
.table-warning td,
.table-warning thead th,
.table-warning tbody + tbody {
  border-color: #ffdf7e;
}

.table-hover .table-warning:hover {
  background-color: #ffe8a1;
}

.table-hover .table-warning:hover > td,
.table-hover .table-warning:hover > th {
  background-color: #ffe8a1;
}

.table-danger,
.table-danger > th,
.table-danger > td {
  background-color: #fdd6d6;
}

.table-danger th,
.table-danger td,
.table-danger thead th,
.table-danger tbody + tbody {
  border-color: #fbb3b2;
}

.table-hover .table-danger:hover {
  background-color: #fcbebe;
}

.table-hover .table-danger:hover > td,
.table-hover .table-danger:hover > th {
  background-color: #fcbebe;
}

.table-light,
.table-light > th,
.table-light > td {
  background-color: #fbfcfc;
}

.table-light th,
.table-light td,
.table-light thead th,
.table-light tbody + tbody {
  border-color: #f7f9fa;
}

.table-hover .table-light:hover {
  background-color: #ecf1f1;
}

.table-hover .table-light:hover > td,
.table-hover .table-light:hover > th {
  background-color: #ecf1f1;
}

.table-dark,
.table-dark > th,
.table-dark > td {
  background-color: #c5c6c8;
}

.table-dark th,
.table-dark td,
.table-dark thead th,
.table-dark tbody + tbody {
  border-color: #939699;
}

.table-hover .table-dark:hover {
  background-color: #b8b9bc;
}

.table-hover .table-dark:hover > td,
.table-hover .table-dark:hover > th {
  background-color: #b8b9bc;
}

.table-active,
.table-active > th,
.table-active > td {
  background-color: rgba(0, 0, 0, 0.075);
}

.table-hover .table-active:hover {
  background-color: rgba(0, 0, 0, 0.075);
}

.table-hover .table-active:hover > td,
.table-hover .table-active:hover > th {
  background-color: rgba(0, 0, 0, 0.075);
}

.table .thead-dark th {
  color: #fff;
  background-color: #2f353a;
  border-color: #40484f;
}

.table .thead-light th {
  color: #5c6873;
  background-color: #e4e7ea;
  border-color: #c8ced3;
}

.table-dark {
  color: #fff;
  background-color: #2f353a;
}

.table-dark th,
.table-dark td,
.table-dark thead th {
  border-color: #40484f;
}

.table-dark.table-bordered {
  border: 0;
}

.table-dark.table-striped tbody tr:nth-of-type(odd) {
  background-color: rgba(255, 255, 255, 0.05);
}

.table-dark.table-hover tbody tr:hover {
  color: #fff;
  background-color: rgba(255, 255, 255, 0.075);
}

@media (max-width: 575.98px) {
  .table-responsive-sm {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
  .table-responsive-sm > .table-bordered {
    border: 0;
  }
}

@media (max-width: 767.98px) {
  .table-responsive-md {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
  .table-responsive-md > .table-bordered {
    border: 0;
  }
}

@media (max-width: 991.98px) {
  .table-responsive-lg {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
  .table-responsive-lg > .table-bordered {
    border: 0;
  }
}

@media (max-width: 1199.98px) {
  .table-responsive-xl {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
  .table-responsive-xl > .table-bordered {
    border: 0;
  }
}

.table-responsive {
  display: block;
  width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}

.table-responsive > .table-bordered {
  border: 0;
}

.form-control {
  display: block;
  width: 100%;
  height: calc(1.5em + 0.75rem + 2px);
  padding: 0.375rem 0.75rem;
  font-size: 0.875rem;
  font-weight: 400;
  line-height: 1.5;
  color: #735c5c;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #e4e7ea;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

@media (prefers-reduced-motion: reduce) {
  .form-control {
    transition: none;
  }
}

.form-control::-ms-expand {
  background-color: transparent;
  border: 0;
}

.form-control:focus {
  color: #5c6873;
  background-color: #fff;
  border-color: rgba(248, 108, 107, 0.25);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(248, 108, 107, 0.25);
  outline: 0 none;
}

.form-control::-webkit-input-placeholder {
  color: #73818f;
  opacity: 1;
}

.form-control::-moz-placeholder {
  color: #73818f;
  opacity: 1;
}

.form-control:-ms-input-placeholder {
  color: #73818f;
  opacity: 1;
}

.form-control::-ms-input-placeholder {
  color: #73818f;
  opacity: 1;
}

.form-control::placeholder {
  color: #73818f;
  opacity: 1;
}

.form-control:disabled, .form-control[readonly] {
  background-color: #e4e7ea;
  opacity: 1;
}

select.form-control:focus::-ms-value {
  color: #5c6873;
  background-color: #fff;
}

.form-control-file,
.form-control-range {
  display: block;
  width: 100%;
}

.col-form-label {
  padding-top: calc(0.375rem + 1px);
  padding-bottom: calc(0.375rem + 1px);
  margin-bottom: 0;
  font-size: inherit;
  line-height: 1.5;
}

.col-form-label-lg {
  padding-top: calc(0.5rem + 1px);
  padding-bottom: calc(0.5rem + 1px);
  font-size: 1.09375rem;
  line-height: 1.5;
}

.col-form-label-sm {
  padding-top: calc(0.25rem + 1px);
  padding-bottom: calc(0.25rem + 1px);
  font-size: 0.765625rem;
  line-height: 1.5;
}

.form-control-plaintext {
  display: block;
  width: 100%;
  padding-top: 0.375rem;
  padding-bottom: 0.375rem;
  margin-bottom: 0;
  line-height: 1.5;
  color: #23282c;
  background-color: transparent;
  border: solid transparent;
  border-width: 1px 0;
}

.form-control-plaintext.form-control-sm, .form-control-plaintext.form-control-lg {
  padding-right: 0;
  padding-left: 0;
}

.form-control-sm {
  height: calc(1.5em + 0.5rem + 2px);
  padding: 0.25rem 0.5rem;
  font-size: 0.765625rem;
  line-height: 1.5;
  border-radius: 0.2rem;
}

.form-control-lg {
  height: calc(1.5em + 1rem + 2px);
  padding: 0.5rem 1rem;
  font-size: 1.09375rem;
  line-height: 1.5;
  border-radius: 0.3rem;
}

select.form-control[size], select.form-control[multiple] {
  height: auto;
}

textarea.form-control {
  height: auto;
}

.form-group {
  margin-bottom: 1rem;
}

.form-text {
  display: block;
  margin-top: 0.25rem;
}

.form-row {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  margin-right: -5px;
  margin-left: -5px;
}

.form-row > .col,
.form-row > [class*="col-"] {
  padding-right: 5px;
  padding-left: 5px;
}

.form-check {
  position: relative;
  display: block;
  padding-left: 1.25rem;
}

.form-check-input {
  position: absolute;
  margin-top: 0.3rem;
  margin-left: -1.25rem;
}

.form-check-input:disabled ~ .form-check-label {
  color: #73818f;
}

.form-check-label {
  margin-bottom: 0;
}

.form-check-inline {
  display: -ms-inline-flexbox;
  display: inline-flex;
  -ms-flex-align: center;
  align-items: center;
  padding-left: 0;
  margin-right: 0.75rem;
}

.form-check-inline .form-check-input {
  position: static;
  margin-top: 0;
  margin-right: 0.3125rem;
  margin-left: 0;
}

.valid-feedback {
  display: none;
  width: 100%;
  margin-top: 0.25rem;
  font-size: 80%;
  color: #4dbd74;
}

.valid-tooltip {
  position: absolute;
  top: 100%;
  z-index: 5;
  display: none;
  max-width: 100%;
  padding: 0.25rem 0.5rem;
  margin-top: .1rem;
  font-size: 0.765625rem;
  line-height: 1.5;
  color: #fff;
  background-color: rgba(77, 189, 116, 0.9);
  border-radius: 0.25rem;
}

.was-validated .form-control:valid, .form-control.is-valid {
  border-color: #2bb8c4;
  padding-right: calc(1.5em + 0.75rem);
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%234dbd74' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e");
  background-repeat: no-repeat;
  background-position: center right calc(0.375em + 0.1875rem);
  background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
}

.was-validated .form-control:valid:focus, .form-control.is-valid:focus {
  border-color: #2bb8c4;
  box-shadow: 0 0 0 0.2rem rgba(77, 189, 116, 0.25);
}

.was-validated .form-control:valid ~ .valid-feedback,
.was-validated .form-control:valid ~ .valid-tooltip, .form-control.is-valid ~ .valid-feedback,
.form-control.is-valid ~ .valid-tooltip {
  display: block;
}

.was-validated textarea.form-control:valid, textarea.form-control.is-valid {
  padding-right: calc(1.5em + 0.75rem);
  background-position: top calc(0.375em + 0.1875rem) right calc(0.375em + 0.1875rem);
}

.was-validated .custom-select:valid, .custom-select.is-valid {
  border-color: #2bb8c4;
  padding-right: calc((1em + 0.75rem) * 3 / 4 + 1.75rem);
  background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3e%3cpath fill='%232f353a' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right 0.75rem center/8px 10px, url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%234dbd74' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e") #fff no-repeat center right 1.75rem/calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
}

.was-validated .custom-select:valid:focus, .custom-select.is-valid:focus {
  border-color: #2bb8c4;
  box-shadow: 0 0 0 0.2rem rgba(77, 189, 116, 0.25);
}

.was-validated .custom-select:valid ~ .valid-feedback,
.was-validated .custom-select:valid ~ .valid-tooltip, .custom-select.is-valid ~ .valid-feedback,
.custom-select.is-valid ~ .valid-tooltip {
  display: block;
}

.was-validated .form-control-file:valid ~ .valid-feedback,
.was-validated .form-control-file:valid ~ .valid-tooltip, .form-control-file.is-valid ~ .valid-feedback,
.form-control-file.is-valid ~ .valid-tooltip {
  display: block;
}

.was-validated .form-check-input:valid ~ .form-check-label, .form-check-input.is-valid ~ .form-check-label {
  color: #4dbd74;
}

.was-validated .form-check-input:valid ~ .valid-feedback,
.was-validated .form-check-input:valid ~ .valid-tooltip, .form-check-input.is-valid ~ .valid-feedback,
.form-check-input.is-valid ~ .valid-tooltip {
  display: block;
}

.was-validated .custom-control-input:valid ~ .custom-control-label, .custom-control-input.is-valid ~ .custom-control-label {
  color: #4dbd74;
}

.was-validated .custom-control-input:valid ~ .custom-control-label::before, .custom-control-input.is-valid ~ .custom-control-label::before {
  border-color: #2bb8c4;
}

.was-validated .custom-control-input:valid ~ .valid-feedback,
.was-validated .custom-control-input:valid ~ .valid-tooltip, .custom-control-input.is-valid ~ .valid-feedback,
.custom-control-input.is-valid ~ .valid-tooltip {
  display: block;
}

.was-validated .custom-control-input:valid:checked ~ .custom-control-label::before, .custom-control-input.is-valid:checked ~ .custom-control-label::before {
  border-color: #72cb91;
  background-color: #72cb91;
}

.was-validated .custom-control-input:valid:focus ~ .custom-control-label::before, .custom-control-input.is-valid:focus ~ .custom-control-label::before {
  box-shadow: 0 0 0 0.2rem rgba(77, 189, 116, 0.25);
}

.was-validated .custom-control-input:valid:focus:not(:checked) ~ .custom-control-label::before, .custom-control-input.is-valid:focus:not(:checked) ~ .custom-control-label::before {
  border-color: #2bb8c4;
}

.was-validated .custom-file-input:valid ~ .custom-file-label, .custom-file-input.is-valid ~ .custom-file-label {
  border-color: #2bb8c4;
}

.was-validated .custom-file-input:valid ~ .valid-feedback,
.was-validated .custom-file-input:valid ~ .valid-tooltip, .custom-file-input.is-valid ~ .valid-feedback,
.custom-file-input.is-valid ~ .valid-tooltip {
  display: block;
}

.was-validated .custom-file-input:valid:focus ~ .custom-file-label, .custom-file-input.is-valid:focus ~ .custom-file-label {
  border-color: #2bb8c4;
  box-shadow: 0 0 0 0.2rem rgba(77, 189, 116, 0.25);
}

.invalid-feedback {
  display: none;
  width: 100%;
  margin-top: 0.25rem;
  font-size: 80%;
  color: #f86c6b;
}

.invalid-tooltip {
  position: absolute;
  top: 100%;
  z-index: 5;
  display: none;
  max-width: 100%;
  padding: 0.25rem 0.5rem;
  margin-top: .1rem;
  font-size: 0.765625rem;
  line-height: 1.5;
  color: #fff;
  background-color: rgba(248, 108, 107, 0.9);
  border-radius: 0.25rem;
}

.was-validated .form-control:invalid, .form-control.is-invalid {
  border-color: #f86c6b;
  padding-right: calc(1.5em + 0.75rem);
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23f86c6b' viewBox='-2 -2 7 7'%3e%3cpath stroke='%23f86c6b' d='M0 0l3 3m0-3L0 3'/%3e%3ccircle r='.5'/%3e%3ccircle cx='3' r='.5'/%3e%3ccircle cy='3' r='.5'/%3e%3ccircle cx='3' cy='3' r='.5'/%3e%3c/svg%3E");
  background-repeat: no-repeat;
  background-position: center right calc(0.375em + 0.1875rem);
  background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
}

.was-validated .form-control:invalid:focus, .form-control.is-invalid:focus {
  border-color: #f86c6b;
  box-shadow: 0 0 0 0.2rem rgba(248, 108, 107, 0.25);
}

.was-validated .form-control:invalid ~ .invalid-feedback,
.was-validated .form-control:invalid ~ .invalid-tooltip, .form-control.is-invalid ~ .invalid-feedback,
.form-control.is-invalid ~ .invalid-tooltip {
  display: block;
}

.was-validated textarea.form-control:invalid, textarea.form-control.is-invalid {
  padding-right: calc(1.5em + 0.75rem);
  background-position: top calc(0.375em + 0.1875rem) right calc(0.375em + 0.1875rem);
}

.was-validated .custom-select:invalid, .custom-select.is-invalid {
  border-color: #f86c6b;
  padding-right: calc((1em + 0.75rem) * 3 / 4 + 1.75rem);
  background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3e%3cpath fill='%232f353a' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right 0.75rem center/8px 10px, url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23f86c6b' viewBox='-2 -2 7 7'%3e%3cpath stroke='%23f86c6b' d='M0 0l3 3m0-3L0 3'/%3e%3ccircle r='.5'/%3e%3ccircle cx='3' r='.5'/%3e%3ccircle cy='3' r='.5'/%3e%3ccircle cx='3' cy='3' r='.5'/%3e%3c/svg%3E") #fff no-repeat center right 1.75rem/calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
}

.was-validated .custom-select:invalid:focus, .custom-select.is-invalid:focus {
  border-color: #f86c6b;
  box-shadow: 0 0 0 0.2rem rgba(248, 108, 107, 0.25);
}

.was-validated .custom-select:invalid ~ .invalid-feedback,
.was-validated .custom-select:invalid ~ .invalid-tooltip, .custom-select.is-invalid ~ .invalid-feedback,
.custom-select.is-invalid ~ .invalid-tooltip {
  display: block;
}

.was-validated .form-control-file:invalid ~ .invalid-feedback,
.was-validated .form-control-file:invalid ~ .invalid-tooltip, .form-control-file.is-invalid ~ .invalid-feedback,
.form-control-file.is-invalid ~ .invalid-tooltip {
  display: block;
}

.was-validated .form-check-input:invalid ~ .form-check-label, .form-check-input.is-invalid ~ .form-check-label {
  color: #f86c6b;
}

.was-validated .form-check-input:invalid ~ .invalid-feedback,
.was-validated .form-check-input:invalid ~ .invalid-tooltip, .form-check-input.is-invalid ~ .invalid-feedback,
.form-check-input.is-invalid ~ .invalid-tooltip {
  display: block;
}

.was-validated .custom-control-input:invalid ~ .custom-control-label, .custom-control-input.is-invalid ~ .custom-control-label {
  color: #f86c6b;
}

.was-validated .custom-control-input:invalid ~ .custom-control-label::before, .custom-control-input.is-invalid ~ .custom-control-label::before {
  border-color: #f86c6b;
}

.was-validated .custom-control-input:invalid ~ .invalid-feedback,
.was-validated .custom-control-input:invalid ~ .invalid-tooltip, .custom-control-input.is-invalid ~ .invalid-feedback,
.custom-control-input.is-invalid ~ .invalid-tooltip {
  display: block;
}

.was-validated .custom-control-input:invalid:checked ~ .custom-control-label::before, .custom-control-input.is-invalid:checked ~ .custom-control-label::before {
  border-color: #fa9c9c;
  background-color: #fa9c9c;
}

.was-validated .custom-control-input:invalid:focus ~ .custom-control-label::before, .custom-control-input.is-invalid:focus ~ .custom-control-label::before {
  box-shadow: 0 0 0 0.2rem rgba(248, 108, 107, 0.25);
}

.was-validated .custom-control-input:invalid:focus:not(:checked) ~ .custom-control-label::before, .custom-control-input.is-invalid:focus:not(:checked) ~ .custom-control-label::before {
  border-color: #f86c6b;
}

.was-validated .custom-file-input:invalid ~ .custom-file-label, .custom-file-input.is-invalid ~ .custom-file-label {
  border-color: #f86c6b;
}

.was-validated .custom-file-input:invalid ~ .invalid-feedback,
.was-validated .custom-file-input:invalid ~ .invalid-tooltip, .custom-file-input.is-invalid ~ .invalid-feedback,
.custom-file-input.is-invalid ~ .invalid-tooltip {
  display: block;
}

.was-validated .custom-file-input:invalid:focus ~ .custom-file-label, .custom-file-input.is-invalid:focus ~ .custom-file-label {
  border-color: #f86c6b;
  box-shadow: 0 0 0 0.2rem rgba(248, 108, 107, 0.25);
}

.form-inline {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-flow: row wrap;
  flex-flow: row wrap;
  -ms-flex-align: center;
  align-items: center;
}

.form-inline .form-check {
  width: 100%;
}

@media (min-width: 576px) {
  .form-inline label {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: center;
    justify-content: center;
    margin-bottom: 0;
  }
  .form-inline .form-group {
    display: -ms-flexbox;
    display: flex;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    -ms-flex-flow: row wrap;
    flex-flow: row wrap;
    -ms-flex-align: center;
    align-items: center;
    margin-bottom: 0;
  }
  .form-inline .form-control {
    display: inline-block;
    width: auto;
    vertical-align: middle;
  }
  .form-inline .form-control-plaintext {
    display: inline-block;
  }
  .form-inline .input-group,
  .form-inline .custom-select {
    width: auto;
  }
  .form-inline .form-check {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: center;
    justify-content: center;
    width: auto;
    padding-left: 0;
  }
  .form-inline .form-check-input {
    position: relative;
    -ms-flex-negative: 0;
    flex-shrink: 0;
    margin-top: 0;
    margin-right: 0.25rem;
    margin-left: 0;
  }
  .form-inline .custom-control {
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: center;
    justify-content: center;
  }
  .form-inline .custom-control-label {
    margin-bottom: 0;
  }
}

.btn {
  display: inline-block;
  font-weight: 400;
  color: #23282c;
  text-align: center;
  vertical-align: middle;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  background-color: transparent;
  border: 1px solid transparent;
  padding: 0.375rem 0.75rem;
  font-size: 0.875rem;
  line-height: 1.5;
  border-radius: 0.25rem;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

@media (prefers-reduced-motion: reduce) {
  .btn {
    transition: none;
  }
}

.btn:hover {
  color: #23282c;
  text-decoration: none;
}

.btn:focus, .btn.focus {
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(216, 32, 32, 0.25);
}

.btn.disabled, .btn:disabled {
  opacity: 0.65;
}

a.btn.disabled,
fieldset:disabled a.btn {
  pointer-events: none;
}

.btn-primary {
  color: #fff;
  background-color: #20a8d8;
  border-color: #20a8d8;
}

.btn-primary:hover {
  color: #fff;
  background-color: #1b8eb7;
  border-color: #1985ac;
}

.btn-primary:focus, .btn-primary.focus {
  box-shadow: 0 0 0 0.2rem rgba(222, 65, 65, 0.5);
}

.btn-primary.disabled, .btn-primary:disabled {
  color: #fff;
  background-color: #20a8d8;
  border-color: #20a8d8;
}

.btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active,
.show > .btn-primary.dropdown-toggle {
  color: #fff;
  background-color: #1985ac;
  border-color: #187da0;
}

.btn-primary:not(:disabled):not(.disabled):active:focus, .btn-primary:not(:disabled):not(.disabled).active:focus,
.show > .btn-primary.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(65, 181, 222, 0.5);
}

.btn-secondary {
  color: #23282c;
  background-color: #c8ced3;
  border-color: #c8ced3;
}

.btn-secondary:hover {
  color: #23282c;
  background-color: #b3bbc2;
  border-color: #acb5bc;
}

.btn-secondary:focus, .btn-secondary.focus {
  box-shadow: 0 0 0 0.2rem rgba(175, 181, 186, 0.5);
}

.btn-secondary.disabled, .btn-secondary:disabled {
  color: #23282c;
  background-color: #c8ced3;
  border-color: #c8ced3;
}

.btn-secondary:not(:disabled):not(.disabled):active, .btn-secondary:not(:disabled):not(.disabled).active,
.show > .btn-secondary.dropdown-toggle {
  color: #23282c;
  background-color: #acb5bc;
  border-color: #a5aeb7;
}

.btn-secondary:not(:disabled):not(.disabled):active:focus, .btn-secondary:not(:disabled):not(.disabled).active:focus,
.show > .btn-secondary.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(175, 181, 186, 0.5);
}

.btn-success {
  color: #fff;
  background-color: #36c6d3;
  border-color: #2bb8c4;
}

.btn-success:hover {
  color: #fff;
  background-color: #248b95;
  border-color: #2bb8c4;
}

.btn-success:focus, .btn-success.focus {
  box-shadow: 0 0 0 0.2rem rgba(104, 199, 137, 0.5);
}

.btn-success.disabled, .btn-success:disabled {
  color: #fff;
  background-color: #36c6d3;
  border-color: #2bb8c4;
}

.btn-success:not(:disabled):not(.disabled):active, .btn-success:not(:disabled):not(.disabled).active,
.show > .btn-success.dropdown-toggle {
  color: #fff;
  background-color: #36c6d3;
  border-color: #2bb8c4;
}

.btn-success:not(:disabled):not(.disabled):active:focus, .btn-success:not(:disabled):not(.disabled).active:focus,
.show > .btn-success.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(104, 199, 137, 0.5);
}

.btn-info {
  color: #23282c;
  background-color: #63c2de;
  border-color: #63c2de;
}

.btn-info:hover {
  color: #23282c;
  background-color: #43b6d7;
  border-color: #39b2d5;
}

.btn-info:focus, .btn-info.focus {
  box-shadow: 0 0 0 0.2rem rgba(89, 171, 195, 0.5);
}

.btn-info.disabled, .btn-info:disabled {
  color: #23282c;
  background-color: #63c2de;
  border-color: #63c2de;
}

.btn-info:not(:disabled):not(.disabled):active, .btn-info:not(:disabled):not(.disabled).active,
.show > .btn-info.dropdown-toggle {
  color: #fff;
  background-color: #39b2d5;
  border-color: #2eadd3;
}

.btn-info:not(:disabled):not(.disabled):active:focus, .btn-info:not(:disabled):not(.disabled).active:focus,
.show > .btn-info.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(89, 171, 195, 0.5);
}

.btn-warning {
  color: #23282c;
  background-color: #ffc107;
  border-color: #ffc107;
}

.btn-warning:hover {
  color: #23282c;
  background-color: #e0a800;
  border-color: #d39e00;
}

.btn-warning:focus, .btn-warning.focus {
  box-shadow: 0 0 0 0.2rem rgba(222, 170, 13, 0.5);
}

.btn-warning.disabled, .btn-warning:disabled {
  color: #23282c;
  background-color: #ffc107;
  border-color: #ffc107;
}

.btn-warning:not(:disabled):not(.disabled):active, .btn-warning:not(:disabled):not(.disabled).active,
.show > .btn-warning.dropdown-toggle {
  color: #23282c;
  background-color: #d39e00;
  border-color: #c69500;
}

.btn-warning:not(:disabled):not(.disabled):active:focus, .btn-warning:not(:disabled):not(.disabled).active:focus,
.show > .btn-warning.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(222, 170, 13, 0.5);
}

.btn-danger {
  color: #fff;
  background-color: #f86c6b;
  border-color: #f86c6b;
}

.btn-danger:hover {
  color: #fff;
  background-color: #f64846;
  border-color: #f63c3a;
}

.btn-danger:focus, .btn-danger.focus {
  box-shadow: 0 0 0 0.2rem rgba(249, 130, 129, 0.5);
}

.btn-danger.disabled, .btn-danger:disabled {
  color: #fff;
  background-color: #f86c6b;
  border-color: #f86c6b;
}

.btn-danger:not(:disabled):not(.disabled):active, .btn-danger:not(:disabled):not(.disabled).active,
.show > .btn-danger.dropdown-toggle {
  color: #fff;
  background-color: #f63c3a;
  border-color: #f5302e;
}

.btn-danger:not(:disabled):not(.disabled):active:focus, .btn-danger:not(:disabled):not(.disabled).active:focus,
.show > .btn-danger.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(249, 130, 129, 0.5);
}

.btn-light {
  color: #23282c;
  background-color: #f0f3f5;
  border-color: #f0f3f5;
}

.btn-light:hover {
  color: #23282c;
  background-color: #d9e1e6;
  border-color: #d1dbe1;
}

.btn-light:focus, .btn-light.focus {
  box-shadow: 0 0 0 0.2rem rgba(209, 213, 215, 0.5);
}

.btn-light.disabled, .btn-light:disabled {
  color: #23282c;
  background-color: #f0f3f5;
  border-color: #f0f3f5;
}

.btn-light:not(:disabled):not(.disabled):active, .btn-light:not(:disabled):not(.disabled).active,
.show > .btn-light.dropdown-toggle {
  color: #23282c;
  background-color: #d1dbe1;
  border-color: #cad4dc;
}

.btn-light:not(:disabled):not(.disabled):active:focus, .btn-light:not(:disabled):not(.disabled).active:focus,
.show > .btn-light.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(209, 213, 215, 0.5);
}

.btn-dark {
  color: #fff;
  background-color: #2f353a;
  border-color: #2f353a;
}

.btn-dark:hover {
  color: #fff;
  background-color: #1e2225;
  border-color: #181b1e;
}

.btn-dark:focus, .btn-dark.focus {
  box-shadow: 0 0 0 0.2rem rgba(78, 83, 88, 0.5);
}

.btn-dark.disabled, .btn-dark:disabled {
  color: #fff;
  background-color: #2f353a;
  border-color: #2f353a;
}

.btn-dark:not(:disabled):not(.disabled):active, .btn-dark:not(:disabled):not(.disabled).active,
.show > .btn-dark.dropdown-toggle {
  color: #fff;
  background-color: #181b1e;
  border-color: #121517;
}

.btn-dark:not(:disabled):not(.disabled):active:focus, .btn-dark:not(:disabled):not(.disabled).active:focus,
.show > .btn-dark.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(78, 83, 88, 0.5);
}

.btn-outline-primary {
  color: #20a8d8;
  border-color: #20a8d8;
}

.btn-outline-primary:hover {
  color: #fff;
  background-color: #20a8d8;
  border-color: #20a8d8;
}

.btn-outline-primary:focus, .btn-outline-primary.focus {
  box-shadow: 0 0 0 0.2rem rgba(32, 168, 216, 0.5);
}

.btn-outline-primary.disabled, .btn-outline-primary:disabled {
  color: #20a8d8;
  background-color: transparent;
}

.btn-outline-primary:not(:disabled):not(.disabled):active, .btn-outline-primary:not(:disabled):not(.disabled).active,
.show > .btn-outline-primary.dropdown-toggle {
  color: #fff;
  background-color: #20a8d8;
  border-color: #20a8d8;
}

.btn-outline-primary:not(:disabled):not(.disabled):active:focus, .btn-outline-primary:not(:disabled):not(.disabled).active:focus,
.show > .btn-outline-primary.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(32, 168, 216, 0.5);
}

.btn-outline-secondary {
  color: #c8ced3;
  border-color: #c8ced3;
}

.btn-outline-secondary:hover {
  color: #23282c;
  background-color: #c8ced3;
  border-color: #c8ced3;
}

.btn-outline-secondary:focus, .btn-outline-secondary.focus {
  box-shadow: 0 0 0 0.2rem rgba(200, 206, 211, 0.5);
}

.btn-outline-secondary.disabled, .btn-outline-secondary:disabled {
  color: #c8ced3;
  background-color: transparent;
}

.btn-outline-secondary:not(:disabled):not(.disabled):active, .btn-outline-secondary:not(:disabled):not(.disabled).active,
.show > .btn-outline-secondary.dropdown-toggle {
  color: #23282c;
  background-color: #c8ced3;
  border-color: #c8ced3;
}

.btn-outline-secondary:not(:disabled):not(.disabled):active:focus, .btn-outline-secondary:not(:disabled):not(.disabled).active:focus,
.show > .btn-outline-secondary.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(200, 206, 211, 0.5);
}

.btn-outline-success {
  color: #4dbd74;
  border-color: #2bb8c4;
}

.btn-outline-success:hover {
  color: #fff;
  background-color: #36c6d3;
  border-color: #2bb8c4;
}

.btn-outline-success:focus, .btn-outline-success.focus {
  box-shadow: 0 0 0 0.2rem rgba(77, 189, 116, 0.5);
}

.btn-outline-success.disabled, .btn-outline-success:disabled {
  color: #4dbd74;
  background-color: transparent;
}

.btn-outline-success:not(:disabled):not(.disabled):active, .btn-outline-success:not(:disabled):not(.disabled).active,
.show > .btn-outline-success.dropdown-toggle {
  color: #fff;
  background-color: #36c6d3;
  border-color: #2bb8c4;
}

.btn-outline-success:not(:disabled):not(.disabled):active:focus, .btn-outline-success:not(:disabled):not(.disabled).active:focus,
.show > .btn-outline-success.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(77, 189, 116, 0.5);
}

.btn-outline-info {
  color: #63c2de;
  border-color: #63c2de;
}

.btn-outline-info:hover {
  color: #23282c;
  background-color: #63c2de;
  border-color: #63c2de;
}

.btn-outline-info:focus, .btn-outline-info.focus {
  box-shadow: 0 0 0 0.2rem rgba(99, 194, 222, 0.5);
}

.btn-outline-info.disabled, .btn-outline-info:disabled {
  color: #63c2de;
  background-color: transparent;
}

.btn-outline-info:not(:disabled):not(.disabled):active, .btn-outline-info:not(:disabled):not(.disabled).active,
.show > .btn-outline-info.dropdown-toggle {
  color: #23282c;
  background-color: #63c2de;
  border-color: #63c2de;
}

.btn-outline-info:not(:disabled):not(.disabled):active:focus, .btn-outline-info:not(:disabled):not(.disabled).active:focus,
.show > .btn-outline-info.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(99, 194, 222, 0.5);
}

.btn-outline-warning {
  color: #ffc107;
  border-color: #ffc107;
}

.btn-outline-warning:hover {
  color: #23282c;
  background-color: #ffc107;
  border-color: #ffc107;
}

.btn-outline-warning:focus, .btn-outline-warning.focus {
  box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);
}

.btn-outline-warning.disabled, .btn-outline-warning:disabled {
  color: #ffc107;
  background-color: transparent;
}

.btn-outline-warning:not(:disabled):not(.disabled):active, .btn-outline-warning:not(:disabled):not(.disabled).active,
.show > .btn-outline-warning.dropdown-toggle {
  color: #23282c;
  background-color: #ffc107;
  border-color: #ffc107;
}

.btn-outline-warning:not(:disabled):not(.disabled):active:focus, .btn-outline-warning:not(:disabled):not(.disabled).active:focus,
.show > .btn-outline-warning.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);
}

.btn-outline-danger {
  color: #f86c6b;
  border-color: #f86c6b;
}

.btn-outline-danger:hover {
  color: #fff;
  background-color: #f86c6b;
  border-color: #f86c6b;
}

.btn-outline-danger:focus, .btn-outline-danger.focus {
  box-shadow: 0 0 0 0.2rem rgba(248, 108, 107, 0.5);
}

.btn-outline-danger.disabled, .btn-outline-danger:disabled {
  color: #f86c6b;
  background-color: transparent;
}

.btn-outline-danger:not(:disabled):not(.disabled):active, .btn-outline-danger:not(:disabled):not(.disabled).active,
.show > .btn-outline-danger.dropdown-toggle {
  color: #fff;
  background-color: #f86c6b;
  border-color: #f86c6b;
}

.btn-outline-danger:not(:disabled):not(.disabled):active:focus, .btn-outline-danger:not(:disabled):not(.disabled).active:focus,
.show > .btn-outline-danger.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(248, 108, 107, 0.5);
}

.btn-outline-light {
  color: #f0f3f5;
  border-color: #f0f3f5;
}

.btn-outline-light:hover {
  color: #23282c;
  background-color: #f0f3f5;
  border-color: #f0f3f5;
}

.btn-outline-light:focus, .btn-outline-light.focus {
  box-shadow: 0 0 0 0.2rem rgba(240, 243, 245, 0.5);
}

.btn-outline-light.disabled, .btn-outline-light:disabled {
  color: #f0f3f5;
  background-color: transparent;
}

.btn-outline-light:not(:disabled):not(.disabled):active, .btn-outline-light:not(:disabled):not(.disabled).active,
.show > .btn-outline-light.dropdown-toggle {
  color: #23282c;
  background-color: #f0f3f5;
  border-color: #f0f3f5;
}

.btn-outline-light:not(:disabled):not(.disabled):active:focus, .btn-outline-light:not(:disabled):not(.disabled).active:focus,
.show > .btn-outline-light.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(240, 243, 245, 0.5);
}

.btn-outline-dark {
  color: #2f353a;
  border-color: #2f353a;
}

.btn-outline-dark:hover {
  color: #fff;
  background-color: #2f353a;
  border-color: #2f353a;
}

.btn-outline-dark:focus, .btn-outline-dark.focus {
  box-shadow: 0 0 0 0.2rem rgba(47, 53, 58, 0.5);
}

.btn-outline-dark.disabled, .btn-outline-dark:disabled {
  color: #2f353a;
  background-color: transparent;
}

.btn-outline-dark:not(:disabled):not(.disabled):active, .btn-outline-dark:not(:disabled):not(.disabled).active,
.show > .btn-outline-dark.dropdown-toggle {
  color: #fff;
  background-color: #2f353a;
  border-color: #2f353a;
}

.btn-outline-dark:not(:disabled):not(.disabled):active:focus, .btn-outline-dark:not(:disabled):not(.disabled).active:focus,
.show > .btn-outline-dark.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(47, 53, 58, 0.5);
}

.btn-link {
  font-weight: 400;
  color: #20a8d8;
  text-decoration: none;
}

.btn-link:hover {
  color: #167495;
  text-decoration: underline;
}

.btn-link:focus, .btn-link.focus {
  text-decoration: underline;
  box-shadow: none;
}

.btn-link:disabled, .btn-link.disabled {
  color: #73818f;
  pointer-events: none;
}

.btn-lg, .btn-group-lg > .btn {
  padding: 0.5rem 1rem;
  font-size: 1.09375rem;
  line-height: 1.5;
  border-radius: 0.3rem;
}

.btn-sm, .btn-group-sm > .btn {
  padding: 0.25rem 0.5rem;
  font-size: 0.765625rem;
  line-height: 1.5;
  border-radius: 0.2rem;
}

.btn-block {
  display: block;
  width: 100%;
}

.btn-block + .btn-block {
  margin-top: 0.5rem;
}

input[type="submit"].btn-block,
input[type="reset"].btn-block,
input[type="button"].btn-block {
  width: 100%;
}

.fade {
  transition: opacity 0.15s linear;
}

@media (prefers-reduced-motion: reduce) {
  .fade {
    transition: none;
  }
}

.fade:not(.show) {
  opacity: 0;
}

.collapse:not(.show) {
  display: none;
}

.collapsing {
  position: relative;
  height: 0;
  overflow: hidden;
  transition: height 0.35s ease;
}

@media (prefers-reduced-motion: reduce) {
  .collapsing {
    transition: none;
  }
}

.dropup,
.dropright,
.dropdown,
.dropleft {
  position: relative;
}

.dropdown-toggle {
  white-space: nowrap;
}

.dropdown-toggle::after {
  display: inline-block;
  margin-left: 0.255em;
  vertical-align: 0.255em;
  content: "";
  border-top: 0.3em solid;
  border-right: 0.3em solid transparent;
  border-bottom: 0;
  border-left: 0.3em solid transparent;
}

.dropdown-toggle:empty::after {
  margin-left: 0;
}

.dropdown-menu {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1000;
  display: none;
  float: left;
  min-width: 10rem;
  padding: 0 0;
  margin: 0.125rem 0 0;
  font-size: 0.875rem;
  color: #23282c;
  text-align: left;
  list-style: none;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #c8ced3;
  border-radius: 0.25rem;
}

.dropdown-menu-left {
  right: auto;
  left: 0;
}

.dropdown-menu-right {
  right: 0;
  left: auto;
}

@media (min-width: 576px) {
  .dropdown-menu-sm-left {
    right: auto;
    left: 0;
  }
  .dropdown-menu-sm-right {
    right: 0;
    left: auto;
  }
}

@media (min-width: 768px) {
  .dropdown-menu-md-left {
    right: auto;
    left: 0;
  }
  .dropdown-menu-md-right {
    right: 0;
    left: auto;
  }
}

@media (min-width: 992px) {
  .dropdown-menu-lg-left {
    right: auto;
    left: 0;
  }
  .dropdown-menu-lg-right {
    right: 0;
    left: auto;
  }
}

@media (min-width: 1200px) {
  .dropdown-menu-xl-left {
    right: auto;
    left: 0;
  }
  .dropdown-menu-xl-right {
    right: 0;
    left: auto;
  }
}

.dropup .dropdown-menu {
  top: auto;
  bottom: 100%;
  margin-top: 0;
  margin-bottom: 0.125rem;
}

.dropup .dropdown-toggle::after {
  display: inline-block;
  margin-left: 0.255em;
  vertical-align: 0.255em;
  content: "";
  border-top: 0;
  border-right: 0.3em solid transparent;
  border-bottom: 0.3em solid;
  border-left: 0.3em solid transparent;
}

.dropup .dropdown-toggle:empty::after {
  margin-left: 0;
}

.dropright .dropdown-menu {
  top: 0;
  right: auto;
  left: 100%;
  margin-top: 0;
  margin-left: 0.125rem;
}

.dropright .dropdown-toggle::after {
  display: inline-block;
  margin-left: 0.255em;
  vertical-align: 0.255em;
  content: "";
  border-top: 0.3em solid transparent;
  border-right: 0;
  border-bottom: 0.3em solid transparent;
  border-left: 0.3em solid;
}

.dropright .dropdown-toggle:empty::after {
  margin-left: 0;
}

.dropright .dropdown-toggle::after {
  vertical-align: 0;
}

.dropleft .dropdown-menu {
  top: 0;
  right: 100%;
  left: auto;
  margin-top: 0;
  margin-right: 0.125rem;
}

.dropleft .dropdown-toggle::after {
  display: inline-block;
  margin-left: 0.255em;
  vertical-align: 0.255em;
  content: "";
}

.dropleft .dropdown-toggle::after {
  display: none;
}

.dropleft .dropdown-toggle::before {
  display: inline-block;
  margin-right: 0.255em;
  vertical-align: 0.255em;
  content: "";
  border-top: 0.3em solid transparent;
  border-right: 0.3em solid;
  border-bottom: 0.3em solid transparent;
}

.dropleft .dropdown-toggle:empty::after {
  margin-left: 0;
}

.dropleft .dropdown-toggle::before {
  vertical-align: 0;
}

.dropdown-menu[x-placement^="top"], .dropdown-menu[x-placement^="right"], .dropdown-menu[x-placement^="bottom"], .dropdown-menu[x-placement^="left"] {
  right: auto;
  bottom: auto;
}

.dropdown-divider {
  height: 0;
  margin: 0.5rem 0;
  overflow: hidden;
  border-top: 1px solid #e4e7ea;
}

.dropdown-item {
  display: block;
  width: 100%;
  padding: 0.25rem 1.5rem;
  clear: both;
  font-weight: 400;
  color: #23282c;
  text-align: inherit;
  white-space: nowrap;
  background-color: transparent;
  border: 0;
}

.dropdown-item:first-child {
  border-top-left-radius: calc(0.25rem - 1px);
  border-top-right-radius: calc(0.25rem - 1px);
}

.dropdown-item:last-child {
  border-bottom-right-radius: calc(0.25rem - 1px);
  border-bottom-left-radius: calc(0.25rem - 1px);
}

.dropdown-item:hover, .dropdown-item:focus {
  color: #181b1e;
  text-decoration: none;
  background-color: #f0f3f5;
}

.dropdown-item.active, .dropdown-item:active {
  color: #fff;
  text-decoration: none;
  background-color: #bb9b00;
}

.dropdown-item.disabled, .dropdown-item:disabled {
  color: #73818f;
  pointer-events: none;
  background-color: transparent;
}

.dropdown-menu.show {
  display: block;
}

.dropdown-header {
  display: block;
  padding: 0 1.5rem;
  margin-bottom: 0;
  font-size: 0.765625rem;
  color: #73818f;
  white-space: nowrap;
}

.dropdown-item-text {
  display: block;
  padding: 0.25rem 1.5rem;
  color: #23282c;
}

.btn-group,
.btn-group-vertical {
  position: relative;
  display: -ms-inline-flexbox;
  display: inline-flex;
  vertical-align: middle;
}

.btn-group > .btn,
.btn-group-vertical > .btn {
  position: relative;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
}

.btn-group > .btn:hover,
.btn-group-vertical > .btn:hover {
  z-index: 1;
}

.btn-group > .btn:focus, .btn-group > .btn:active, .btn-group > .btn.active,
.btn-group-vertical > .btn:focus,
.btn-group-vertical > .btn:active,
.btn-group-vertical > .btn.active {
  z-index: 1;
}

.btn-toolbar {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -ms-flex-pack: start;
  justify-content: flex-start;
}

.btn-toolbar .input-group {
  width: auto;
}

.btn-group > .btn:not(:first-child),
.btn-group > .btn-group:not(:first-child) {
  margin-left: -1px;
}

.btn-group > .btn:not(:last-child):not(.dropdown-toggle),
.btn-group > .btn-group:not(:last-child) > .btn {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}

.btn-group > .btn:not(:first-child),
.btn-group > .btn-group:not(:first-child) > .btn {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}

.dropdown-toggle-split {
  padding-right: 0.5625rem;
  padding-left: 0.5625rem;
}

.dropdown-toggle-split::after,
.dropup .dropdown-toggle-split::after,
.dropright .dropdown-toggle-split::after {
  margin-left: 0;
}

.dropleft .dropdown-toggle-split::before {
  margin-right: 0;
}

.btn-sm + .dropdown-toggle-split, .btn-group-sm > .btn + .dropdown-toggle-split {
  padding-right: 0.375rem;
  padding-left: 0.375rem;
}

.btn-lg + .dropdown-toggle-split, .btn-group-lg > .btn + .dropdown-toggle-split {
  padding-right: 0.75rem;
  padding-left: 0.75rem;
}

.btn-group-vertical {
  -ms-flex-direction: column;
  flex-direction: column;
  -ms-flex-align: start;
  align-items: flex-start;
  -ms-flex-pack: center;
  justify-content: center;
}

.btn-group-vertical > .btn,
.btn-group-vertical > .btn-group {
  width: 100%;
}

.btn-group-vertical > .btn:not(:first-child),
.btn-group-vertical > .btn-group:not(:first-child) {
  margin-top: -1px;
}

.btn-group-vertical > .btn:not(:last-child):not(.dropdown-toggle),
.btn-group-vertical > .btn-group:not(:last-child) > .btn {
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.btn-group-vertical > .btn:not(:first-child),
.btn-group-vertical > .btn-group:not(:first-child) > .btn {
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.btn-group-toggle > .btn,
.btn-group-toggle > .btn-group > .btn {
  margin-bottom: 0;
}

.btn-group-toggle > .btn input[type="radio"],
.btn-group-toggle > .btn input[type="checkbox"],
.btn-group-toggle > .btn-group > .btn input[type="radio"],
.btn-group-toggle > .btn-group > .btn input[type="checkbox"] {
  position: absolute;
  clip: rect(0, 0, 0, 0);
  pointer-events: none;
}

.input-group {
  position: relative;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -ms-flex-align: stretch;
  align-items: stretch;
  width: 100%;
}

.input-group > .form-control,
.input-group > .form-control-plaintext,
.input-group > .custom-select,
.input-group > .custom-file {
  position: relative;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  width: 1%;
  margin-bottom: 0;
}

.input-group > .form-control + .form-control,
.input-group > .form-control + .custom-select,
.input-group > .form-control + .custom-file,
.input-group > .form-control-plaintext + .form-control,
.input-group > .form-control-plaintext + .custom-select,
.input-group > .form-control-plaintext + .custom-file,
.input-group > .custom-select + .form-control,
.input-group > .custom-select + .custom-select,
.input-group > .custom-select + .custom-file,
.input-group > .custom-file + .form-control,
.input-group > .custom-file + .custom-select,
.input-group > .custom-file + .custom-file {
  margin-left: -1px;
}

.input-group > .form-control:focus,
.input-group > .custom-select:focus,
.input-group > .custom-file .custom-file-input:focus ~ .custom-file-label {
  z-index: 3;
}

.input-group > .custom-file .custom-file-input:focus {
  z-index: 4;
}

.input-group > .form-control:not(:last-child),
.input-group > .custom-select:not(:last-child) {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}

.input-group > .form-control:not(:first-child),
.input-group > .custom-select:not(:first-child) {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}

.input-group > .custom-file {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
}

.input-group > .custom-file:not(:last-child) .custom-file-label,
.input-group > .custom-file:not(:last-child) .custom-file-label::after {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}

.input-group > .custom-file:not(:first-child) .custom-file-label {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}

.input-group-prepend,
.input-group-append {
  display: -ms-flexbox;
  display: flex;
}

.input-group-prepend .btn,
.input-group-append .btn {
  position: relative;
  z-index: 2;
}

.input-group-prepend .btn:focus,
.input-group-append .btn:focus {
  z-index: 3;
}

.input-group-prepend .btn + .btn,
.input-group-prepend .btn + .input-group-text,
.input-group-prepend .input-group-text + .input-group-text,
.input-group-prepend .input-group-text + .btn,
.input-group-append .btn + .btn,
.input-group-append .btn + .input-group-text,
.input-group-append .input-group-text + .input-group-text,
.input-group-append .input-group-text + .btn {
  margin-left: -1px;
}

.input-group-prepend {
  margin-right: -1px;
}

.input-group-append {
  margin-left: -1px;
}

.input-group-text {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding: 0.375rem 0.75rem;
  margin-bottom: 0;
  font-size: 0.875rem;
  font-weight: 400;
  line-height: 1.5;
  color: #5c6873;
  text-align: center;
  white-space: nowrap;
  background-color: #f0f3f5;
  border: 1px solid #e4e7ea;
  border-radius: 0.25rem;
}

.input-group-text input[type="radio"],
.input-group-text input[type="checkbox"] {
  margin-top: 0;
}

.input-group-lg > .form-control:not(textarea),
.input-group-lg > .custom-select {
  height: calc(1.5em + 1rem + 2px);
}

.input-group-lg > .form-control,
.input-group-lg > .custom-select,
.input-group-lg > .input-group-prepend > .input-group-text,
.input-group-lg > .input-group-append > .input-group-text,
.input-group-lg > .input-group-prepend > .btn,
.input-group-lg > .input-group-append > .btn {
  padding: 0.5rem 1rem;
  font-size: 1.09375rem;
  line-height: 1.5;
  border-radius: 0.3rem;
}

.input-group-sm > .form-control:not(textarea),
.input-group-sm > .custom-select {
  height: calc(1.5em + 0.5rem + 2px);
}

.input-group-sm > .form-control,
.input-group-sm > .custom-select,
.input-group-sm > .input-group-prepend > .input-group-text,
.input-group-sm > .input-group-append > .input-group-text,
.input-group-sm > .input-group-prepend > .btn,
.input-group-sm > .input-group-append > .btn {
  padding: 0.25rem 0.5rem;
  font-size: 0.765625rem;
  line-height: 1.5;
  border-radius: 0.2rem;
}

.input-group-lg > .custom-select,
.input-group-sm > .custom-select {
  padding-right: 1.75rem;
}

.input-group > .input-group-prepend > .btn,
.input-group > .input-group-prepend > .input-group-text,
.input-group > .input-group-append:not(:last-child) > .btn,
.input-group > .input-group-append:not(:last-child) > .input-group-text,
.input-group > .input-group-append:last-child > .btn:not(:last-child):not(.dropdown-toggle),
.input-group > .input-group-append:last-child > .input-group-text:not(:last-child) {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}

.input-group > .input-group-append > .btn,
.input-group > .input-group-append > .input-group-text,
.input-group > .input-group-prepend:not(:first-child) > .btn,
.input-group > .input-group-prepend:not(:first-child) > .input-group-text,
.input-group > .input-group-prepend:first-child > .btn:not(:first-child),
.input-group > .input-group-prepend:first-child > .input-group-text:not(:first-child) {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}

.custom-control {
  position: relative;
  display: block;
  min-height: 1.3125rem;
  padding-left: 1.5rem;
}

.custom-control-inline {
  display: -ms-inline-flexbox;
  display: inline-flex;
  margin-right: 1rem;
}

.custom-control-input {
  position: absolute;
  z-index: -1;
  opacity: 0;
}

.custom-control-input:checked ~ .custom-control-label::before {
  color: #fff;
  border-color: #20a8d8;
  background-color: #20a8d8;
}

.custom-control-input:focus ~ .custom-control-label::before {
  box-shadow: 0 0 0 0.2rem rgba(32, 168, 216, 0.25);
}

.custom-control-input:focus:not(:checked) ~ .custom-control-label::before {
  border-color: #c5b96b;
}

.custom-control-input:not(:disabled):active ~ .custom-control-label::before {
  color: #fff;
  background-color: #b6e4f4;
  border-color: #b6e4f4;
}

.custom-control-input:disabled ~ .custom-control-label {
  color: #73818f;
}

.custom-control-input:disabled ~ .custom-control-label::before {
  background-color: #e4e7ea;
}

.custom-control-label {
  position: relative;
  margin-bottom: 0;
  vertical-align: top;
}

.custom-control-label::before {
  position: absolute;
  top: 0.15625rem;
  left: -1.5rem;
  display: block;
  width: 1rem;
  height: 1rem;
  pointer-events: none;
  content: "";
  background-color: #fff;
  border: #8f9ba6 solid 1px;
}

.custom-control-label::after {
  position: absolute;
  top: 0.15625rem;
  left: -1.5rem;
  display: block;
  width: 1rem;
  height: 1rem;
  content: "";
  background: no-repeat 50% / 50% 50%;
}

.custom-checkbox .custom-control-label::before {
  border-radius: 0.25rem;
}

.custom-checkbox .custom-control-input:checked ~ .custom-control-label::after {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%23fff' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26 2.974 7.25 8 2.193z'/%3e%3c/svg%3e");
}

.custom-checkbox .custom-control-input:indeterminate ~ .custom-control-label::before {
  border-color: #20a8d8;
  background-color: #20a8d8;
}

.custom-checkbox .custom-control-input:indeterminate ~ .custom-control-label::after {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 4'%3e%3cpath stroke='%23fff' d='M0 2h4'/%3e%3c/svg%3e");
}

.custom-checkbox .custom-control-input:disabled:checked ~ .custom-control-label::before {
  background-color: rgba(32, 168, 216, 0.5);
}

.custom-checkbox .custom-control-input:disabled:indeterminate ~ .custom-control-label::before {
  background-color: rgba(32, 168, 216, 0.5);
}

.custom-radio .custom-control-label::before {
  border-radius: 50%;
}

.custom-radio .custom-control-input:checked ~ .custom-control-label::after {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%23fff'/%3e%3c/svg%3e");
}

.custom-radio .custom-control-input:disabled:checked ~ .custom-control-label::before {
  background-color: rgba(32, 168, 216, 0.5);
}

.custom-switch {
  padding-left: 2.25rem;
}

.custom-switch .custom-control-label::before {
  left: -2.25rem;
  width: 1.75rem;
  pointer-events: all;
  border-radius: 0.5rem;
}

.custom-switch .custom-control-label::after {
  top: calc(0.15625rem + 2px);
  left: calc(-2.25rem + 2px);
  width: calc(1rem - 4px);
  height: calc(1rem - 4px);
  background-color: #8f9ba6;
  border-radius: 0.5rem;
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-transform 0.15s ease-in-out;
  transition: transform 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  transition: transform 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-transform 0.15s ease-in-out;
}

@media (prefers-reduced-motion: reduce) {
  .custom-switch .custom-control-label::after {
    transition: none;
  }
}

.custom-switch .custom-control-input:checked ~ .custom-control-label::after {
  background-color: #fff;
  -webkit-transform: translateX(0.75rem);
  transform: translateX(0.75rem);
}

.custom-switch .custom-control-input:disabled:checked ~ .custom-control-label::before {
  background-color: rgba(32, 168, 216, 0.5);
}

.custom-select {
  display: inline-block;
  width: 100%;
  height: calc(1.5em + 0.75rem + 2px);
  padding: 0.375rem 1.75rem 0.375rem 0.75rem;
  font-size: 0.875rem;
  font-weight: 400;
  line-height: 1.5;
  color: #5c6873;
  vertical-align: middle;
  background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3e%3cpath fill='%232f353a' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right 0.75rem center/8px 10px;
  background-color: #fff;
  border: 1px solid #e4e7ea;
  border-radius: 0.25rem;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}

.custom-select:focus {
  border-color: #f86c6b;
  outline: 0;
  box-shadow: 0 0 0 0.2rem #f86c6b;
}

.custom-select:focus::-ms-value {
  color: #5c6873;
  background-color: #fff;
}

.custom-select[multiple], .custom-select[size]:not([size="1"]) {
  height: auto;
  padding-right: 0.75rem;
  background-image: none;
}

.custom-select:disabled {
  color: #73818f;
  background-color: #e4e7ea;
}

.custom-select::-ms-expand {
  display: none;
}

.custom-select-sm {
  height: calc(1.5em + 0.5rem + 2px);
  padding-top: 0.25rem;
  padding-bottom: 0.25rem;
  padding-left: 0.5rem;
  font-size: 0.765625rem;
}

.custom-select-lg {
  height: calc(1.5em + 1rem + 2px);
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
  padding-left: 1rem;
  font-size: 1.09375rem;
}

.custom-file {
  position: relative;
  display: inline-block;
  width: 100%;
  height: calc(1.5em + 0.75rem + 2px);
  margin-bottom: 0;
}

.custom-file-input {
  position: relative;
  z-index: 2;
  width: 100%;
  height: calc(1.5em + 0.75rem + 2px);
  margin: 0;
  opacity: 0;
}

.custom-file-input:focus ~ .custom-file-label {
  border-color: rgba(248, 108, 107, 0.25);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(248, 108, 107, 0.25);
  outline: 0 none;
}

.custom-file-input:disabled ~ .custom-file-label {
  background-color: #e4e7ea;
}

.custom-file-input:lang(en) ~ .custom-file-label::after {
  content: "Browse";
}

.custom-file-input ~ .custom-file-label[data-browse]::after {
  content: attr(data-browse);
}

.custom-file-label {
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  z-index: 1;
  height: calc(1.5em + 0.75rem + 2px);
  padding: 0.375rem 0.75rem;
  font-weight: 400;
  line-height: 1.5;
  color: #5c6873;
  background-color: #fff;
  border: 1px solid #e4e7ea;
  border-radius: 0.25rem;
}

.custom-file-label::after {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  z-index: 3;
  display: block;
  height: calc(1.5em + 0.75rem);
  padding: 0.375rem 0.75rem;
  line-height: 1.5;
  color: #5c6873;
  content: "Browse";
  background-color: #f0f3f5;
  border-left: inherit;
  border-radius: 0 0.25rem 0.25rem 0;
}

.custom-range {
  width: 100%;
  height: calc(1rem + 0.4rem);
  padding: 0;
  background-color: transparent;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}

.custom-range:focus {
  outline: none;
}

.custom-range:focus::-webkit-slider-thumb {
  box-shadow: 0 0 0 1px #e4e5e6, 0 0 0 0.2rem rgba(32, 168, 216, 0.25);
}

.custom-range:focus::-moz-range-thumb {
  box-shadow: 0 0 0 1px #e4e5e6, 0 0 0 0.2rem rgba(32, 168, 216, 0.25);
}

.custom-range:focus::-ms-thumb {
  box-shadow: 0 0 0 1px #e4e5e6, 0 0 0 0.2rem rgba(32, 168, 216, 0.25);
}

.custom-range::-moz-focus-outer {
  border: 0;
}

.custom-range::-webkit-slider-thumb {
  width: 1rem;
  height: 1rem;
  margin-top: -0.25rem;
  background-color: #20a8d8;
  border: 0;
  border-radius: 1rem;
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  -webkit-appearance: none;
  appearance: none;
}

@media (prefers-reduced-motion: reduce) {
  .custom-range::-webkit-slider-thumb {
    transition: none;
  }
}

.custom-range::-webkit-slider-thumb:active {
  background-color: #b6e4f4;
}

.custom-range::-webkit-slider-runnable-track {
  width: 100%;
  height: 0.5rem;
  color: transparent;
  cursor: pointer;
  background-color: #c8ced3;
  border-color: transparent;
  border-radius: 1rem;
}

.custom-range::-moz-range-thumb {
  width: 1rem;
  height: 1rem;
  background-color: #20a8d8;
  border: 0;
  border-radius: 1rem;
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  -moz-appearance: none;
  appearance: none;
}

@media (prefers-reduced-motion: reduce) {
  .custom-range::-moz-range-thumb {
    transition: none;
  }
}

.custom-range::-moz-range-thumb:active {
  background-color: #b6e4f4;
}

.custom-range::-moz-range-track {
  width: 100%;
  height: 0.5rem;
  color: transparent;
  cursor: pointer;
  background-color: #c8ced3;
  border-color: transparent;
  border-radius: 1rem;
}

.custom-range::-ms-thumb {
  width: 1rem;
  height: 1rem;
  margin-top: 0;
  margin-right: 0.2rem;
  margin-left: 0.2rem;
  background-color: #20a8d8;
  border: 0;
  border-radius: 1rem;
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  appearance: none;
}

@media (prefers-reduced-motion: reduce) {
  .custom-range::-ms-thumb {
    transition: none;
  }
}

.custom-range::-ms-thumb:active {
  background-color: #b6e4f4;
}

.custom-range::-ms-track {
  width: 100%;
  height: 0.5rem;
  color: transparent;
  cursor: pointer;
  background-color: transparent;
  border-color: transparent;
  border-width: 0.5rem;
}

.custom-range::-ms-fill-lower {
  background-color: #c8ced3;
  border-radius: 1rem;
}

.custom-range::-ms-fill-upper {
  margin-right: 15px;
  background-color: #c8ced3;
  border-radius: 1rem;
}

.custom-range:disabled::-webkit-slider-thumb {
  background-color: #8f9ba6;
}

.custom-range:disabled::-webkit-slider-runnable-track {
  cursor: default;
}

.custom-range:disabled::-moz-range-thumb {
  background-color: #8f9ba6;
}

.custom-range:disabled::-moz-range-track {
  cursor: default;
}

.custom-range:disabled::-ms-thumb {
  background-color: #8f9ba6;
}

.custom-control-label::before,
.custom-file-label,
.custom-select {
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

@media (prefers-reduced-motion: reduce) {
  .custom-control-label::before,
  .custom-file-label,
  .custom-select {
    transition: none;
  }
}

.nav {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  padding-left: 0;
  margin-bottom: 0;
  list-style: none;
}

.nav-link {
  display: block;
  padding: 0.5rem 1rem;
}

.nav-link:hover, .nav-link:focus {
  text-decoration: none;
}

.nav-link.disabled {
  color: #73818f;
  pointer-events: none;
  cursor: default;
}

.nav-tabs {
  border-bottom: 1px solid #c8ced3;
}

.nav-tabs .nav-item {
  margin-bottom: -1px;
}

.nav-tabs .nav-link {
  border: 1px solid transparent;
  border-top-left-radius: 0.25rem;
  border-top-right-radius: 0.25rem;
}

.nav-tabs .nav-link:hover, .nav-tabs .nav-link:focus {
  border-color: #c8ced3 #c8ced3 #c8ced3;
}

.nav-tabs .nav-link.disabled {
  color: #73818f;
  background-color: transparent;
  border-color: transparent;
}

.nav-tabs .nav-link.active,
.nav-tabs .nav-item.show .nav-link {
  color: #23282c;
  background-color: #fff;
  border-color: #c8ced3 #c8ced3 #fff;
}

.nav-tabs .dropdown-menu {
  margin-top: -1px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.nav-pills .nav-link {
  border-radius: 0.25rem;
}

.nav-pills .nav-link.active,
.nav-pills .show > .nav-link {
  color: #fff;
  background-color: #20a8d8;
}

.nav-fill .nav-item {
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  text-align: center;
}

.nav-justified .nav-item {
  -ms-flex-preferred-size: 0;
  flex-basis: 0;
  -ms-flex-positive: 1;
  flex-grow: 1;
  text-align: center;
}

.tab-content > .tab-pane {
  display: none;
}

.tab-content > .active {
  display: block;
}

.navbar {
  position: relative;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -ms-flex-align: center;
  align-items: center;
  -ms-flex-pack: justify;
  justify-content: space-between;
  padding: 0.5rem 1rem;
}

.navbar > .container,
.navbar > .container-fluid {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -ms-flex-align: center;
  align-items: center;
  -ms-flex-pack: justify;
  justify-content: space-between;
}

.navbar-brand {
  display: inline-block;
  padding-top: 0.335938rem;
  padding-bottom: 0.335938rem;
  margin-right: 1rem;
  font-size: 1.09375rem;
  line-height: inherit;
  white-space: nowrap;
}

.navbar-brand:hover, .navbar-brand:focus {
  text-decoration: none;
}

.navbar-nav {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
  padding-left: 0;
  margin-bottom: 0;
  list-style: none;
}

.navbar-nav .nav-link {
  padding-right: 0;
  padding-left: 0;
}

.navbar-nav .dropdown-menu {
  position: static;
  float: none;
}

.navbar-text {
  display: inline-block;
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
}

.navbar-collapse {
  -ms-flex-preferred-size: 100%;
  flex-basis: 100%;
  -ms-flex-positive: 1;
  flex-grow: 1;
  -ms-flex-align: center;
  align-items: center;
}

.navbar-toggler {
  padding: 0.25rem 0.75rem;
  font-size: 1.09375rem;
  line-height: 1;
  background-color: transparent;
  border: 1px solid transparent;
  border-radius: 0.25rem;
}

.navbar-toggler:hover, .navbar-toggler:focus {
  text-decoration: none;
}

.navbar-toggler-icon {
  display: inline-block;
  width: 1.5em;
  height: 1.5em;
  vertical-align: middle;
  content: "";
  background: no-repeat center center;
  background-size: 100% 100%;
}

@media (max-width: 575.98px) {
  .navbar-expand-sm > .container,
  .navbar-expand-sm > .container-fluid {
    padding-right: 0;
    padding-left: 0;
  }
}

@media (min-width: 576px) {
  .navbar-expand-sm {
    -ms-flex-flow: row nowrap;
    flex-flow: row nowrap;
    -ms-flex-pack: start;
    justify-content: flex-start;
  }
  .navbar-expand-sm .navbar-nav {
    -ms-flex-direction: row;
    flex-direction: row;
  }
  .navbar-expand-sm .navbar-nav .dropdown-menu {
    position: absolute;
  }
  .navbar-expand-sm .navbar-nav .nav-link {
    padding-right: 0.5rem;
    padding-left: 0.5rem;
  }
  .navbar-expand-sm > .container,
  .navbar-expand-sm > .container-fluid {
    -ms-flex-wrap: nowrap;
    flex-wrap: nowrap;
  }
  .navbar-expand-sm .navbar-collapse {
    display: -ms-flexbox !important;
    display: flex !important;
    -ms-flex-preferred-size: auto;
    flex-basis: auto;
  }
  .navbar-expand-sm .navbar-toggler {
    display: none;
  }
}

@media (max-width: 767.98px) {
  .navbar-expand-md > .container,
  .navbar-expand-md > .container-fluid {
    padding-right: 0;
    padding-left: 0;
  }
}

@media (min-width: 768px) {
  .navbar-expand-md {
    -ms-flex-flow: row nowrap;
    flex-flow: row nowrap;
    -ms-flex-pack: start;
    justify-content: flex-start;
  }
  .navbar-expand-md .navbar-nav {
    -ms-flex-direction: row;
    flex-direction: row;
  }
  .navbar-expand-md .navbar-nav .dropdown-menu {
    position: absolute;
  }
  .navbar-expand-md .navbar-nav .nav-link {
    padding-right: 0.5rem;
    padding-left: 0.5rem;
  }
  .navbar-expand-md > .container,
  .navbar-expand-md > .container-fluid {
    -ms-flex-wrap: nowrap;
    flex-wrap: nowrap;
  }
  .navbar-expand-md .navbar-collapse {
    display: -ms-flexbox !important;
    display: flex !important;
    -ms-flex-preferred-size: auto;
    flex-basis: auto;
  }
  .navbar-expand-md .navbar-toggler {
    display: none;
  }
}

@media (max-width: 991.98px) {
  .navbar-expand-lg > .container,
  .navbar-expand-lg > .container-fluid {
    padding-right: 0;
    padding-left: 0;
  }
}

@media (min-width: 992px) {
  .navbar-expand-lg {
    -ms-flex-flow: row nowrap;
    flex-flow: row nowrap;
    -ms-flex-pack: start;
    justify-content: flex-start;
  }
  .navbar-expand-lg .navbar-nav {
    -ms-flex-direction: row;
    flex-direction: row;
  }
  .navbar-expand-lg .navbar-nav .dropdown-menu {
    position: absolute;
  }
  .navbar-expand-lg .navbar-nav .nav-link {
    padding-right: 0.5rem;
    padding-left: 0.5rem;
  }
  .navbar-expand-lg > .container,
  .navbar-expand-lg > .container-fluid {
    -ms-flex-wrap: nowrap;
    flex-wrap: nowrap;
  }
  .navbar-expand-lg .navbar-collapse {
    display: -ms-flexbox !important;
    display: flex !important;
    -ms-flex-preferred-size: auto;
    flex-basis: auto;
  }
  .navbar-expand-lg .navbar-toggler {
    display: none;
  }
}

@media (max-width: 1199.98px) {
  .navbar-expand-xl > .container,
  .navbar-expand-xl > .container-fluid {
    padding-right: 0;
    padding-left: 0;
  }
}

@media (min-width: 1200px) {
  .navbar-expand-xl {
    -ms-flex-flow: row nowrap;
    flex-flow: row nowrap;
    -ms-flex-pack: start;
    justify-content: flex-start;
  }
  .navbar-expand-xl .navbar-nav {
    -ms-flex-direction: row;
    flex-direction: row;
  }
  .navbar-expand-xl .navbar-nav .dropdown-menu {
    position: absolute;
  }
  .navbar-expand-xl .navbar-nav .nav-link {
    padding-right: 0.5rem;
    padding-left: 0.5rem;
  }
  .navbar-expand-xl > .container,
  .navbar-expand-xl > .container-fluid {
    -ms-flex-wrap: nowrap;
    flex-wrap: nowrap;
  }
  .navbar-expand-xl .navbar-collapse {
    display: -ms-flexbox !important;
    display: flex !important;
    -ms-flex-preferred-size: auto;
    flex-basis: auto;
  }
  .navbar-expand-xl .navbar-toggler {
    display: none;
  }
}

.navbar-expand {
  -ms-flex-flow: row nowrap;
  flex-flow: row nowrap;
  -ms-flex-pack: start;
  justify-content: flex-start;
}

.navbar-expand > .container,
.navbar-expand > .container-fluid {
  padding-right: 0;
  padding-left: 0;
}

.navbar-expand .navbar-nav {
  -ms-flex-direction: row;
  flex-direction: row;
}

.navbar-expand .navbar-nav .dropdown-menu {
  position: absolute;
}

.navbar-expand .navbar-nav .nav-link {
  padding-right: 0.5rem;
  padding-left: 0.5rem;
}

.navbar-expand > .container,
.navbar-expand > .container-fluid {
  -ms-flex-wrap: nowrap;
  flex-wrap: nowrap;
}

.navbar-expand .navbar-collapse {
  display: -ms-flexbox !important;
  display: flex !important;
  -ms-flex-preferred-size: auto;
  flex-basis: auto;
}

.navbar-expand .navbar-toggler {
  display: none;
}

.navbar-light .navbar-brand {
  color: rgba(0, 0, 0, 0.9);
}

.navbar-light .navbar-brand:hover, .navbar-light .navbar-brand:focus {
  color: rgba(0, 0, 0, 0.9);
}

.navbar-light .navbar-nav .nav-link {
  color: rgba(0, 0, 0, 0.5);
}

.navbar-light .navbar-nav .nav-link:hover, .navbar-light .navbar-nav .nav-link:focus {
  color: rgba(0, 0, 0, 0.7);
}

.navbar-light .navbar-nav .nav-link.disabled {
  color: rgba(0, 0, 0, 0.3);
}

.navbar-light .navbar-nav .show > .nav-link,
.navbar-light .navbar-nav .active > .nav-link,
.navbar-light .navbar-nav .nav-link.show,
.navbar-light .navbar-nav .nav-link.active {
  color: rgba(0, 0, 0, 0.9);
}

.navbar-light .navbar-toggler {
  color: rgba(0, 0, 0, 0.5);
  border-color: rgba(0, 0, 0, 0.1);
}

.navbar-light .navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(0, 0, 0, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}

.navbar-light .navbar-text {
  color: rgba(0, 0, 0, 0.5);
}

.navbar-light .navbar-text a {
  color: rgba(0, 0, 0, 0.9);
}

.navbar-light .navbar-text a:hover, .navbar-light .navbar-text a:focus {
  color: rgba(0, 0, 0, 0.9);
}

.navbar-dark .navbar-brand {
  color: #fff;
}

.navbar-dark .navbar-brand:hover, .navbar-dark .navbar-brand:focus {
  color: #fff;
}

.navbar-dark .navbar-nav .nav-link {
  color: rgba(255, 255, 255, 0.5);
}

.navbar-dark .navbar-nav .nav-link:hover, .navbar-dark .navbar-nav .nav-link:focus {
  color: rgba(255, 255, 255, 0.75);
}

.navbar-dark .navbar-nav .nav-link.disabled {
  color: rgba(255, 255, 255, 0.25);
}

.navbar-dark .navbar-nav .show > .nav-link,
.navbar-dark .navbar-nav .active > .nav-link,
.navbar-dark .navbar-nav .nav-link.show,
.navbar-dark .navbar-nav .nav-link.active {
  color: #fff;
}

.navbar-dark .navbar-toggler {
  color: rgba(255, 255, 255, 0.5);
  border-color: rgba(255, 255, 255, 0.1);
}

.navbar-dark .navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(255, 255, 255, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}

.navbar-dark .navbar-text {
  color: rgba(255, 255, 255, 0.5);
}

.navbar-dark .navbar-text a {
  color: #fff;
}

.navbar-dark .navbar-text a:hover, .navbar-dark .navbar-text a:focus {
  color: #fff;
}

.card {
  position: relative;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 1px solid #c8ced3;
  border-radius: 0.25rem;
}

.card > hr {
  margin-right: 0;
  margin-left: 0;
}

.card > .list-group:first-child .list-group-item:first-child {
  border-top-left-radius: 0.25rem;
  border-top-right-radius: 0.25rem;
}

.card > .list-group:last-child .list-group-item:last-child {
  border-bottom-right-radius: 0.25rem;
  border-bottom-left-radius: 0.25rem;
}

.card-body {
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  padding: 1.25rem;
}

.card-title {
  margin-bottom: 0.75rem;
}

.card-subtitle {
  margin-top: -0.375rem;
  margin-bottom: 0;
}

.card-text:last-child {
  margin-bottom: 0;
}

.card-link:hover {
  text-decoration: none;
}

.card-link + .card-link {
  margin-left: 1.25rem;
}

.card-header {
  padding: 0.75rem 1.25rem;
  margin-bottom: 0;
  background-color: #f0f3f5;
  border-bottom: 1px solid #c8ced3;
}

.card-header:first-child {
  border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
}

.card-header + .list-group .list-group-item:first-child {
  border-top: 0;
}

.card-footer {
  padding: 0.75rem 1.25rem;
  background-color: #f0f3f5;
  border-top: 1px solid #c8ced3;
}

.card-footer:last-child {
  border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px);
}

.card-header-tabs {
  margin-right: -0.625rem;
  margin-bottom: -0.75rem;
  margin-left: -0.625rem;
  border-bottom: 0;
}

.card-header-pills {
  margin-right: -0.625rem;
  margin-left: -0.625rem;
}

.card-img-overlay {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1.25rem;
}

.card-img {
  width: 100%;
  border-radius: calc(0.25rem - 1px);
}

.card-img-top {
  width: 100%;
  border-top-left-radius: calc(0.25rem - 1px);
  border-top-right-radius: calc(0.25rem - 1px);
}

.card-img-bottom {
  width: 100%;
  border-bottom-right-radius: calc(0.25rem - 1px);
  border-bottom-left-radius: calc(0.25rem - 1px);
}

.card-deck {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
}

.card-deck .card {
  margin-bottom: 15px;
}

@media (min-width: 576px) {
  .card-deck {
    -ms-flex-flow: row wrap;
    flex-flow: row wrap;
    margin-right: -15px;
    margin-left: -15px;
  }
  .card-deck .card {
    display: -ms-flexbox;
    display: flex;
    -ms-flex: 1 0 0%;
    flex: 1 0 0%;
    -ms-flex-direction: column;
    flex-direction: column;
    margin-right: 15px;
    margin-bottom: 0;
    margin-left: 15px;
  }
}

.card-group {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
}

.card-group > .card {
  margin-bottom: 15px;
}

@media (min-width: 576px) {
  .card-group {
    -ms-flex-flow: row wrap;
    flex-flow: row wrap;
  }
  .card-group > .card {
    -ms-flex: 1 0 0%;
    flex: 1 0 0%;
    margin-bottom: 0;
  }
  .card-group > .card + .card {
    margin-left: 0;
    border-left: 0;
  }
  .card-group > .card:not(:last-child) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
  }
  .card-group > .card:not(:last-child) .card-img-top,
  .card-group > .card:not(:last-child) .card-header {
    border-top-right-radius: 0;
  }
  .card-group > .card:not(:last-child) .card-img-bottom,
  .card-group > .card:not(:last-child) .card-footer {
    border-bottom-right-radius: 0;
  }
  .card-group > .card:not(:first-child) {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
  }
  .card-group > .card:not(:first-child) .card-img-top,
  .card-group > .card:not(:first-child) .card-header {
    border-top-left-radius: 0;
  }
  .card-group > .card:not(:first-child) .card-img-bottom,
  .card-group > .card:not(:first-child) .card-footer {
    border-bottom-left-radius: 0;
  }
}

.card-columns .card {
  margin-bottom: 0.75rem;
}

@media (min-width: 576px) {
  .card-columns {
    -webkit-column-count: 3;
    -moz-column-count: 3;
    column-count: 3;
    -webkit-column-gap: 1.25rem;
    -moz-column-gap: 1.25rem;
    column-gap: 1.25rem;
    orphans: 1;
    widows: 1;
  }
  .card-columns .card {
    display: inline-block;
    width: 100%;
  }
}

.accordion > .card {
  overflow: hidden;
}

.accordion > .card:not(:first-of-type) .card-header:first-child {
  border-radius: 0;
}

.accordion > .card:not(:first-of-type):not(:last-of-type) {
  border-bottom: 0;
  border-radius: 0;
}

.accordion > .card:first-of-type {
  border-bottom: 0;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.accordion > .card:last-of-type {
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.accordion > .card .card-header {
  margin-bottom: -1px;
}

.breadcrumb {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  padding: 0.75rem 1rem;
  margin-bottom: 1.5rem;
  list-style: none;
  background-color: #fff;
  border-radius: 0;
}

.breadcrumb-item + .breadcrumb-item {
  padding-left: 0.5rem;
}

.breadcrumb-item + .breadcrumb-item::before {
  display: inline-block;
  padding-right: 0.5rem;
  color: #73818f;
  content: "/";
}

.breadcrumb-item + .breadcrumb-item:hover::before {
  text-decoration: underline;
}

.breadcrumb-item + .breadcrumb-item:hover::before {
  text-decoration: none;
}

.breadcrumb-item.active {
  color: #73818f;
}

.pagination {
  display: -ms-flexbox;
  display: flex;
  padding-left: 0;
  list-style: none;
  border-radius: 0.25rem;
}

.page-link {
  position: relative;
  display: block;
  padding: 0.5rem 0.75rem;
  margin-left: -1px;
  line-height: 1.25;
  color: #20a8d8;
  background-color: #fff;
  border: 1px solid #c8ced3;
}

.page-link:hover {
  z-index: 2;
  color: #167495;
  text-decoration: none;
  background-color: #e4e7ea;
  border-color: #c8ced3;
}

.page-link:focus {
  z-index: 2;
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(32, 168, 216, 0.25);
}

.page-item:first-child .page-link {
  margin-left: 0;
  border-top-left-radius: 0.25rem;
  border-bottom-left-radius: 0.25rem;
}

.page-item:last-child .page-link {
  border-top-right-radius: 0.25rem;
  border-bottom-right-radius: 0.25rem;
}

.page-item.active .page-link {
  z-index: 1;
  color: #fff;
  background-color: #20a8d8;
  border-color: #20a8d8;
}

.page-item.disabled .page-link {
  color: #73818f;
  pointer-events: none;
  cursor: auto;
  background-color: #fff;
  border-color: #c8ced3;
}

.pagination-lg .page-link {
  padding: 0.75rem 1.5rem;
  font-size: 1.09375rem;
  line-height: 1.5;
}

.pagination-lg .page-item:first-child .page-link {
  border-top-left-radius: 0.3rem;
  border-bottom-left-radius: 0.3rem;
}

.pagination-lg .page-item:last-child .page-link {
  border-top-right-radius: 0.3rem;
  border-bottom-right-radius: 0.3rem;
}

.pagination-sm .page-link {
  padding: 0.25rem 0.5rem;
  font-size: 0.765625rem;
  line-height: 1.5;
}

.pagination-sm .page-item:first-child .page-link {
  border-top-left-radius: 0.2rem;
  border-bottom-left-radius: 0.2rem;
}

.pagination-sm .page-item:last-child .page-link {
  border-top-right-radius: 0.2rem;
  border-bottom-right-radius: 0.2rem;
}

.badge {
  display: inline-block;
  padding: 0.25em 0.4em;
  font-size: 75%;
  font-weight: 700;
  line-height: 1;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
  border-radius: 0.25rem;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

@media (prefers-reduced-motion: reduce) {
  .badge {
    transition: none;
  }
}

a.badge:hover, a.badge:focus {
  text-decoration: none;
}

.badge:empty {
  display: none;
}

.btn .badge {
  position: relative;
  top: -1px;
}

.badge-pill {
  padding-right: 0.6em;
  padding-left: 0.6em;
  border-radius: 10rem;
}

.badge-primary {
  color: #fff;
  background-color: #20a8d8;
}

a.badge-primary:hover, a.badge-primary:focus {
  color: #fff;
  background-color: #1985ac;
}

a.badge-primary:focus, a.badge-primary.focus {
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(32, 168, 216, 0.5);
}

.badge-secondary {
  color: #23282c;
  background-color: #c8ced3;
}

a.badge-secondary:hover, a.badge-secondary:focus {
  color: #23282c;
  background-color: #acb5bc;
}

a.badge-secondary:focus, a.badge-secondary.focus {
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(200, 206, 211, 0.5);
}

.badge-success {
  color: #fff;
  background-color: #36c6d3;
}

a.badge-success:hover, a.badge-success:focus {
  color: #fff;
  background-color: #36c6d3;
}

a.badge-success:focus, a.badge-success.focus {
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(77, 189, 116, 0.5);
}

.badge-info {
  color: #23282c;
  background-color: #63c2de;
}

a.badge-info:hover, a.badge-info:focus {
  color: #23282c;
  background-color: #39b2d5;
}

a.badge-info:focus, a.badge-info.focus {
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(99, 194, 222, 0.5);
}

.badge-warning {
  color: #23282c;
  background-color: #ffc107;
}

a.badge-warning:hover, a.badge-warning:focus {
  color: #23282c;
  background-color: #d39e00;
}

a.badge-warning:focus, a.badge-warning.focus {
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);
}

.badge-danger {
  color: #fff;
  background-color: #f86c6b;
}

a.badge-danger:hover, a.badge-danger:focus {
  color: #fff;
  background-color: #f63c3a;
}

a.badge-danger:focus, a.badge-danger.focus {
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(248, 108, 107, 0.5);
}

.badge-light {
  color: #23282c;
  background-color: #f0f3f5;
}

a.badge-light:hover, a.badge-light:focus {
  color: #23282c;
  background-color: #d1dbe1;
}

a.badge-light:focus, a.badge-light.focus {
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(240, 243, 245, 0.5);
}

.badge-dark {
  color: #fff;
  background-color: #2f353a;
}

a.badge-dark:hover, a.badge-dark:focus {
  color: #fff;
  background-color: #181b1e;
}

a.badge-dark:focus, a.badge-dark.focus {
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(47, 53, 58, 0.5);
}

.jumbotron {
  padding: 2rem 1rem;
  margin-bottom: 2rem;
  background-color: #e4e7ea;
  border-radius: 0.3rem;
}

@media (min-width: 576px) {
  .jumbotron {
    padding: 4rem 2rem;
  }
}

.jumbotron-fluid {
  padding-right: 0;
  padding-left: 0;
  border-radius: 0;
}

.alert {
  position: relative;
  padding: 0.75rem 1.25rem;
  margin-bottom: 1rem;
  border: 1px solid transparent;
  border-radius: 0.25rem;
}

.alert-heading {
  color: inherit;
}

.alert-link {
  font-weight: 700;
}

.alert-dismissible {
  padding-right: 3.8125rem;
}

.alert-dismissible .close {
  position: absolute;
  top: 0;
  right: 0;
  padding: 0.75rem 1.25rem;
  color: inherit;
}

.alert-primary {
  color: #115770;
  background-color: #d2eef7;
  border-color: #c1e7f4;
}

.alert-primary hr {
  border-top-color: #abdff0;
}

.alert-primary .alert-link {
  color: #0a3544;
}

.alert-secondary {
  color: #686b6e;
  background-color: #f4f5f6;
  border-color: #f0f1f3;
}

.alert-secondary hr {
  border-top-color: #e2e4e8;
}

.alert-secondary .alert-link {
  color: #4f5254;
}

.alert-success {
  color: #28623c;
  background-color: #dbf2e3;
  border-color: #cdedd8;
}

.alert-success hr {
  border-top-color: #bae6c9;
}

.alert-success .alert-link {
  color: #193e26;
}

.alert-info {
  color: #336573;
  background-color: #e0f3f8;
  border-color: #d3eef6;
}

.alert-info hr {
  border-top-color: #bee6f2;
}

.alert-info .alert-link {
  color: #234650;
}

.alert-warning {
  color: #856404;
  background-color: #fff3cd;
  border-color: #ffeeba;
}

.alert-warning hr {
  border-top-color: #ffe8a1;
}

.alert-warning .alert-link {
  color: #533f03;
}

.alert-danger {
  color: #813838;
  background-color: #fee2e1;
  border-color: #fdd6d6;
}

.alert-danger hr {
  border-top-color: #fcbebe;
}

.alert-danger .alert-link {
  color: #5d2929;
}

.alert-light {
  color: #7d7e7f;
  background-color: #fcfdfd;
  border-color: #fbfcfc;
}

.alert-light hr {
  border-top-color: #ecf1f1;
}

.alert-light .alert-link {
  color: #646565;
}

.alert-dark {
  color: #181c1e;
  background-color: #d5d7d8;
  border-color: #c5c6c8;
}

.alert-dark hr {
  border-top-color: #b8b9bc;
}

.alert-dark .alert-link {
  color: #010202;
}

@-webkit-keyframes progress-bar-stripes {
  from {
    background-position: 1rem 0;
  }
  to {
    background-position: 0 0;
  }
}

@keyframes progress-bar-stripes {
  from {
    background-position: 1rem 0;
  }
  to {
    background-position: 0 0;
  }
}

.progress {
  display: -ms-flexbox;
  display: flex;
  height: 1rem;
  overflow: hidden;
  font-size: 0.65625rem;
  background-color: #f0f3f5;
  border-radius: 0.25rem;
}

.progress-bar {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
  -ms-flex-pack: center;
  justify-content: center;
  color: #fff;
  text-align: center;
  white-space: nowrap;
  background-color: #20a8d8;
  transition: width 0.6s ease;
}

@media (prefers-reduced-motion: reduce) {
  .progress-bar {
    transition: none;
  }
}

.progress-bar-striped {
  background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-size: 1rem 1rem;
}

.progress-bar-animated {
  -webkit-animation: progress-bar-stripes 1s linear infinite;
  animation: progress-bar-stripes 1s linear infinite;
}

@media (prefers-reduced-motion: reduce) {
  .progress-bar-animated {
    -webkit-animation: none;
    animation: none;
  }
}

.media {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: start;
  align-items: flex-start;
}

.media-body {
  -ms-flex: 1;
  flex: 1;
}

.list-group {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
  padding-left: 0;
  margin-bottom: 0;
}

.list-group-item-action {
  width: 100%;
  color: #5c6873;
  text-align: inherit;
}

.list-group-item-action:hover, .list-group-item-action:focus {
  z-index: 1;
  color: #5c6873;
  text-decoration: none;
  background-color: #f0f3f5;
}

.list-group-item-action:active {
  color: #23282c;
  background-color: #e4e7ea;
}

.list-group-item {
  position: relative;
  display: block;
  padding: 0.75rem 1.25rem;
  margin-bottom: -1px;
  background-color: #fff;
  border: 1px solid rgba(0, 0, 0, 0.125);
}

.list-group-item:first-child {
  border-top-left-radius: 0.25rem;
  border-top-right-radius: 0.25rem;
}

.list-group-item:last-child {
  margin-bottom: 0;
  border-bottom-right-radius: 0.25rem;
  border-bottom-left-radius: 0.25rem;
}

.list-group-item.disabled, .list-group-item:disabled {
  color: #73818f;
  pointer-events: none;
  background-color: #fff;
}

.list-group-item.active {
  z-index: 2;
  color: #fff;
  background-color: #20a8d8;
  border-color: #20a8d8;
}

.list-group-horizontal {
  -ms-flex-direction: row;
  flex-direction: row;
}

.list-group-horizontal .list-group-item {
  margin-right: -1px;
  margin-bottom: 0;
}

.list-group-horizontal .list-group-item:first-child {
  border-top-left-radius: 0.25rem;
  border-bottom-left-radius: 0.25rem;
  border-top-right-radius: 0;
}

.list-group-horizontal .list-group-item:last-child {
  margin-right: 0;
  border-top-right-radius: 0.25rem;
  border-bottom-right-radius: 0.25rem;
  border-bottom-left-radius: 0;
}

@media (min-width: 576px) {
  .list-group-horizontal-sm {
    -ms-flex-direction: row;
    flex-direction: row;
  }
  .list-group-horizontal-sm .list-group-item {
    margin-right: -1px;
    margin-bottom: 0;
  }
  .list-group-horizontal-sm .list-group-item:first-child {
    border-top-left-radius: 0.25rem;
    border-bottom-left-radius: 0.25rem;
    border-top-right-radius: 0;
  }
  .list-group-horizontal-sm .list-group-item:last-child {
    margin-right: 0;
    border-top-right-radius: 0.25rem;
    border-bottom-right-radius: 0.25rem;
    border-bottom-left-radius: 0;
  }
}

@media (min-width: 768px) {
  .list-group-horizontal-md {
    -ms-flex-direction: row;
    flex-direction: row;
  }
  .list-group-horizontal-md .list-group-item {
    margin-right: -1px;
    margin-bottom: 0;
  }
  .list-group-horizontal-md .list-group-item:first-child {
    border-top-left-radius: 0.25rem;
    border-bottom-left-radius: 0.25rem;
    border-top-right-radius: 0;
  }
  .list-group-horizontal-md .list-group-item:last-child {
    margin-right: 0;
    border-top-right-radius: 0.25rem;
    border-bottom-right-radius: 0.25rem;
    border-bottom-left-radius: 0;
  }
}

@media (min-width: 992px) {
  .list-group-horizontal-lg {
    -ms-flex-direction: row;
    flex-direction: row;
  }
  .list-group-horizontal-lg .list-group-item {
    margin-right: -1px;
    margin-bottom: 0;
  }
  .list-group-horizontal-lg .list-group-item:first-child {
    border-top-left-radius: 0.25rem;
    border-bottom-left-radius: 0.25rem;
    border-top-right-radius: 0;
  }
  .list-group-horizontal-lg .list-group-item:last-child {
    margin-right: 0;
    border-top-right-radius: 0.25rem;
    border-bottom-right-radius: 0.25rem;
    border-bottom-left-radius: 0;
  }
}

@media (min-width: 1200px) {
  .list-group-horizontal-xl {
    -ms-flex-direction: row;
    flex-direction: row;
  }
  .list-group-horizontal-xl .list-group-item {
    margin-right: -1px;
    margin-bottom: 0;
  }
  .list-group-horizontal-xl .list-group-item:first-child {
    border-top-left-radius: 0.25rem;
    border-bottom-left-radius: 0.25rem;
    border-top-right-radius: 0;
  }
  .list-group-horizontal-xl .list-group-item:last-child {
    margin-right: 0;
    border-top-right-radius: 0.25rem;
    border-bottom-right-radius: 0.25rem;
    border-bottom-left-radius: 0;
  }
}

.list-group-flush .list-group-item {
  border-right: 0;
  border-left: 0;
  border-radius: 0;
}

.list-group-flush .list-group-item:last-child {
  margin-bottom: -1px;
}

.list-group-flush:first-child .list-group-item:first-child {
  border-top: 0;
}

.list-group-flush:last-child .list-group-item:last-child {
  margin-bottom: 0;
  border-bottom: 0;
}

.list-group-item-primary {
  color: #115770;
  background-color: #c1e7f4;
}

.list-group-item-primary.list-group-item-action:hover, .list-group-item-primary.list-group-item-action:focus {
  color: #115770;
  background-color: #abdff0;
}

.list-group-item-primary.list-group-item-action.active {
  color: #fff;
  background-color: #115770;
  border-color: #115770;
}

.list-group-item-secondary {
  color: #686b6e;
  background-color: #f0f1f3;
}

.list-group-item-secondary.list-group-item-action:hover, .list-group-item-secondary.list-group-item-action:focus {
  color: #686b6e;
  background-color: #e2e4e8;
}

.list-group-item-secondary.list-group-item-action.active {
  color: #fff;
  background-color: #686b6e;
  border-color: #686b6e;
}

.list-group-item-success {
  color: #28623c;
  background-color: #cdedd8;
}

.list-group-item-success.list-group-item-action:hover, .list-group-item-success.list-group-item-action:focus {
  color: #28623c;
  background-color: #bae6c9;
}

.list-group-item-success.list-group-item-action.active {
  color: #fff;
  background-color: #28623c;
  border-color: #28623c;
}

.list-group-item-info {
  color: #336573;
  background-color: #d3eef6;
}

.list-group-item-info.list-group-item-action:hover, .list-group-item-info.list-group-item-action:focus {
  color: #336573;
  background-color: #bee6f2;
}

.list-group-item-info.list-group-item-action.active {
  color: #fff;
  background-color: #336573;
  border-color: #336573;
}

.list-group-item-warning {
  color: #856404;
  background-color: #ffeeba;
}

.list-group-item-warning.list-group-item-action:hover, .list-group-item-warning.list-group-item-action:focus {
  color: #856404;
  background-color: #ffe8a1;
}

.list-group-item-warning.list-group-item-action.active {
  color: #fff;
  background-color: #856404;
  border-color: #856404;
}

.list-group-item-danger {
  color: #813838;
  background-color: #fdd6d6;
}

.list-group-item-danger.list-group-item-action:hover, .list-group-item-danger.list-group-item-action:focus {
  color: #813838;
  background-color: #fcbebe;
}

.list-group-item-danger.list-group-item-action.active {
  color: #fff;
  background-color: #813838;
  border-color: #813838;
}

.list-group-item-light {
  color: #7d7e7f;
  background-color: #fbfcfc;
}

.list-group-item-light.list-group-item-action:hover, .list-group-item-light.list-group-item-action:focus {
  color: #7d7e7f;
  background-color: #ecf1f1;
}

.list-group-item-light.list-group-item-action.active {
  color: #fff;
  background-color: #7d7e7f;
  border-color: #7d7e7f;
}

.list-group-item-dark {
  color: #181c1e;
  background-color: #c5c6c8;
}

.list-group-item-dark.list-group-item-action:hover, .list-group-item-dark.list-group-item-action:focus {
  color: #181c1e;
  background-color: #b8b9bc;
}

.list-group-item-dark.list-group-item-action.active {
  color: #fff;
  background-color: #181c1e;
  border-color: #181c1e;
}

.close {
  float: right;
  font-size: 1.3125rem;
  font-weight: 700;
  line-height: 1;
  color: #000;
  text-shadow: 0 1px 0 #fff;
  opacity: .5;
}

.close:hover {
  color: #000;
  text-decoration: none;
}

.close:not(:disabled):not(.disabled):hover, .close:not(:disabled):not(.disabled):focus {
  opacity: .75;
}

button.close {
  padding: 0;
  background-color: transparent;
  border: 0;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}

a.close.disabled {
  pointer-events: none;
}

.toast {
  max-width: 350px;
  overflow: hidden;
  font-size: 0.875rem;
  background-color: rgba(255, 255, 255, 0.85);
  background-clip: padding-box;
  border: 1px solid rgba(0, 0, 0, 0.1);
  box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.1);
  -webkit-backdrop-filter: blur(10px);
  backdrop-filter: blur(10px);
  opacity: 0;
  border-radius: 0.25rem;
}

.toast:not(:last-child) {
  margin-bottom: 0.75rem;
}

.toast.showing {
  opacity: 1;
}

.toast.show {
  display: block;
  opacity: 1;
}

.toast.hide {
  display: none;
}

.toast-header {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding: 0.25rem 0.75rem;
  color: #73818f;
  background-color: rgba(255, 255, 255, 0.85);
  background-clip: padding-box;
  border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.toast-body {
  padding: 0.75rem;
}

.modal-open {
  overflow: hidden;
}

.modal-open .modal {
  overflow-x: hidden;
  overflow-y: auto;
}

.modal {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1050;
  display: none;
  width: 100%;
  height: 100%;
  overflow: hidden;
  outline: 0;
}

.modal-dialog {
  position: relative;
  width: auto;
  margin: 0.5rem;
  pointer-events: none;
}

.modal.fade .modal-dialog {
  transition: -webkit-transform 0.3s ease-out;
  transition: transform 0.3s ease-out;
  transition: transform 0.3s ease-out, -webkit-transform 0.3s ease-out;
  -webkit-transform: translate(0, -50px);
  transform: translate(0, -50px);
}

@media (prefers-reduced-motion: reduce) {
  .modal.fade .modal-dialog {
    transition: none;
  }
}

.modal.show .modal-dialog {
  -webkit-transform: none;
  transform: none;
}

.modal-dialog-scrollable {
  display: -ms-flexbox;
  display: flex;
  max-height: calc(100% - 1rem);
}

.modal-dialog-scrollable .modal-content {
  max-height: calc(100vh - 1rem);
  overflow: hidden;
}

.modal-dialog-scrollable .modal-header,
.modal-dialog-scrollable .modal-footer {
  -ms-flex-negative: 0;
  flex-shrink: 0;
}

.modal-dialog-scrollable .modal-body {
  overflow-y: auto;
}

.modal-dialog-centered {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  min-height: calc(100% - 1rem);
}

.modal-dialog-centered::before {
  display: block;
  height: calc(100vh - 1rem);
  content: "";
}

.modal-dialog-centered.modal-dialog-scrollable {
  -ms-flex-direction: column;
  flex-direction: column;
  -ms-flex-pack: center;
  justify-content: center;
  height: 100%;
}

.modal-dialog-centered.modal-dialog-scrollable .modal-content {
  max-height: none;
}

.modal-dialog-centered.modal-dialog-scrollable::before {
  content: none;
}

.modal-content {
  position: relative;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
  width: 100%;
  pointer-events: auto;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 0.3rem;
  outline: 0;
}

.modal-backdrop {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1040;
  width: 100vw;
  height: 100vh;
  background-color: #000;
}

.modal-backdrop.fade {
  opacity: 0;
}

.modal-backdrop.show {
  opacity: 0.5;
}

.modal-header {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: start;
  align-items: flex-start;
  -ms-flex-pack: justify;
  justify-content: space-between;
  padding: 1rem 1rem;
  border-bottom: 1px solid #c8ced3;
  border-top-left-radius: 0.3rem;
  border-top-right-radius: 0.3rem;
}

.modal-header .close {
  padding: 1rem 1rem;
  margin: -1rem -1rem -1rem auto;
}

.modal-title {
  margin-bottom: 0;
  line-height: 1.5;
}

.modal-body {
  position: relative;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  padding: 1rem;
}

.modal-footer {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  -ms-flex-pack: end;
  justify-content: flex-end;
  padding: 1rem;
  border-top: 1px solid #c8ced3;
  border-bottom-right-radius: 0.3rem;
  border-bottom-left-radius: 0.3rem;
}

.modal-footer > :not(:first-child) {
  margin-left: .25rem;
}

.modal-footer > :not(:last-child) {
  margin-right: .25rem;
}

.modal-scrollbar-measure {
  position: absolute;
  top: -9999px;
  width: 50px;
  height: 50px;
  overflow: scroll;
}

@media (min-width: 576px) {
  .modal-dialog {
    max-width: 500px;
    margin: 1.75rem auto;
  }
  .modal-dialog-scrollable {
    max-height: calc(100% - 3.5rem);
  }
  .modal-dialog-scrollable .modal-content {
    max-height: calc(100vh - 3.5rem);
  }
  .modal-dialog-centered {
    min-height: calc(100% - 3.5rem);
  }
  .modal-dialog-centered::before {
    height: calc(100vh - 3.5rem);
  }
  .modal-sm {
    max-width: 300px;
  }
}

@media (min-width: 992px) {
  .modal-lg,
  .modal-xl {
    max-width: 800px;
  }
}

@media (min-width: 1200px) {
  .modal-xl {
    max-width: 1140px;
  }
}

.tooltip {
  position: absolute;
  z-index: 1070;
  display: block;
  margin: 0;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  font-style: normal;
  font-weight: 400;
  line-height: 1.5;
  text-align: left;
  text-align: start;
  text-decoration: none;
  text-shadow: none;
  text-transform: none;
  letter-spacing: normal;
  word-break: normal;
  word-spacing: normal;
  white-space: normal;
  line-break: auto;
  font-size: 0.765625rem;
  word-wrap: break-word;
  opacity: 0;
}

.tooltip.show {
  opacity: 0.9;
}

.tooltip .arrow {
  position: absolute;
  display: block;
  width: 0.8rem;
  height: 0.4rem;
}

.tooltip .arrow::before {
  position: absolute;
  content: "";
  border-color: transparent;
  border-style: solid;
}

.bs-tooltip-top, .bs-tooltip-auto[x-placement^="top"] {
  padding: 0.4rem 0;
}

.bs-tooltip-top .arrow, .bs-tooltip-auto[x-placement^="top"] .arrow {
  bottom: 0;
}

.bs-tooltip-top .arrow::before, .bs-tooltip-auto[x-placement^="top"] .arrow::before {
  top: 0;
  border-width: 0.4rem 0.4rem 0;
  border-top-color: #000;
}

.bs-tooltip-right, .bs-tooltip-auto[x-placement^="right"] {
  padding: 0 0.4rem;
}

.bs-tooltip-right .arrow, .bs-tooltip-auto[x-placement^="right"] .arrow {
  left: 0;
  width: 0.4rem;
  height: 0.8rem;
}

.bs-tooltip-right .arrow::before, .bs-tooltip-auto[x-placement^="right"] .arrow::before {
  right: 0;
  border-width: 0.4rem 0.4rem 0.4rem 0;
  border-right-color: #000;
}

.bs-tooltip-bottom, .bs-tooltip-auto[x-placement^="bottom"] {
  padding: 0.4rem 0;
}

.bs-tooltip-bottom .arrow, .bs-tooltip-auto[x-placement^="bottom"] .arrow {
  top: 0;
}

.bs-tooltip-bottom .arrow::before, .bs-tooltip-auto[x-placement^="bottom"] .arrow::before {
  bottom: 0;
  border-width: 0 0.4rem 0.4rem;
  border-bottom-color: #000;
}

.bs-tooltip-left, .bs-tooltip-auto[x-placement^="left"] {
  padding: 0 0.4rem;
}

.bs-tooltip-left .arrow, .bs-tooltip-auto[x-placement^="left"] .arrow {
  right: 0;
  width: 0.4rem;
  height: 0.8rem;
}

.bs-tooltip-left .arrow::before, .bs-tooltip-auto[x-placement^="left"] .arrow::before {
  left: 0;
  border-width: 0.4rem 0 0.4rem 0.4rem;
  border-left-color: #000;
}

.tooltip-inner {
  max-width: 200px;
  padding: 0.25rem 0.5rem;
  color: #fff;
  text-align: center;
  background-color: #000;
  border-radius: 0.25rem;
}

.popover {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 1060;
  display: block;
  max-width: 276px;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  font-style: normal;
  font-weight: 400;
  line-height: 1.5;
  text-align: left;
  text-align: start;
  text-decoration: none;
  text-shadow: none;
  text-transform: none;
  letter-spacing: normal;
  word-break: normal;
  word-spacing: normal;
  white-space: normal;
  line-break: auto;
  font-size: 0.765625rem;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 0.3rem;
}

.popover .arrow {
  position: absolute;
  display: block;
  width: 1rem;
  height: 0.5rem;
  margin: 0 0.3rem;
}

.popover .arrow::before, .popover .arrow::after {
  position: absolute;
  display: block;
  content: "";
  border-color: transparent;
  border-style: solid;
}

.bs-popover-top, .bs-popover-auto[x-placement^="top"] {
  margin-bottom: 0.5rem;
}

.bs-popover-top > .arrow, .bs-popover-auto[x-placement^="top"] > .arrow {
  bottom: calc((0.5rem + 1px) * -1);
}

.bs-popover-top > .arrow::before, .bs-popover-auto[x-placement^="top"] > .arrow::before {
  bottom: 0;
  border-width: 0.5rem 0.5rem 0;
  border-top-color: rgba(0, 0, 0, 0.25);
}

.bs-popover-top > .arrow::after, .bs-popover-auto[x-placement^="top"] > .arrow::after {
  bottom: 1px;
  border-width: 0.5rem 0.5rem 0;
  border-top-color: #fff;
}

.bs-popover-right, .bs-popover-auto[x-placement^="right"] {
  margin-left: 0.5rem;
}

.bs-popover-right > .arrow, .bs-popover-auto[x-placement^="right"] > .arrow {
  left: calc((0.5rem + 1px) * -1);
  width: 0.5rem;
  height: 1rem;
  margin: 0.3rem 0;
}

.bs-popover-right > .arrow::before, .bs-popover-auto[x-placement^="right"] > .arrow::before {
  left: 0;
  border-width: 0.5rem 0.5rem 0.5rem 0;
  border-right-color: rgba(0, 0, 0, 0.25);
}

.bs-popover-right > .arrow::after, .bs-popover-auto[x-placement^="right"] > .arrow::after {
  left: 1px;
  border-width: 0.5rem 0.5rem 0.5rem 0;
  border-right-color: #fff;
}

.bs-popover-bottom, .bs-popover-auto[x-placement^="bottom"] {
  margin-top: 0.5rem;
}

.bs-popover-bottom > .arrow, .bs-popover-auto[x-placement^="bottom"] > .arrow {
  top: calc((0.5rem + 1px) * -1);
}

.bs-popover-bottom > .arrow::before, .bs-popover-auto[x-placement^="bottom"] > .arrow::before {
  top: 0;
  border-width: 0 0.5rem 0.5rem 0.5rem;
  border-bottom-color: rgba(0, 0, 0, 0.25);
}

.bs-popover-bottom > .arrow::after, .bs-popover-auto[x-placement^="bottom"] > .arrow::after {
  top: 1px;
  border-width: 0 0.5rem 0.5rem 0.5rem;
  border-bottom-color: #fff;
}

.bs-popover-bottom .popover-header::before, .bs-popover-auto[x-placement^="bottom"] .popover-header::before {
  position: absolute;
  top: 0;
  left: 50%;
  display: block;
  width: 1rem;
  margin-left: -0.5rem;
  content: "";
  border-bottom: 1px solid #f7f7f7;
}

.bs-popover-left, .bs-popover-auto[x-placement^="left"] {
  margin-right: 0.5rem;
}

.bs-popover-left > .arrow, .bs-popover-auto[x-placement^="left"] > .arrow {
  right: calc((0.5rem + 1px) * -1);
  width: 0.5rem;
  height: 1rem;
  margin: 0.3rem 0;
}

.bs-popover-left > .arrow::before, .bs-popover-auto[x-placement^="left"] > .arrow::before {
  right: 0;
  border-width: 0.5rem 0 0.5rem 0.5rem;
  border-left-color: rgba(0, 0, 0, 0.25);
}

.bs-popover-left > .arrow::after, .bs-popover-auto[x-placement^="left"] > .arrow::after {
  right: 1px;
  border-width: 0.5rem 0 0.5rem 0.5rem;
  border-left-color: #fff;
}

.popover-header {
  padding: 0.5rem 0.75rem;
  margin-bottom: 0;
  font-size: 0.875rem;
  background-color: #f7f7f7;
  border-bottom: 1px solid #ebebeb;
  border-top-left-radius: calc(0.3rem - 1px);
  border-top-right-radius: calc(0.3rem - 1px);
}

.popover-header:empty {
  display: none;
}

.popover-body {
  padding: 0.5rem 0.75rem;
  color: #23282c;
}

.carousel {
  position: relative;
}

.carousel.pointer-event {
  -ms-touch-action: pan-y;
  touch-action: pan-y;
}

.carousel-inner {
  position: relative;
  width: 100%;
  overflow: hidden;
}

.carousel-inner::after {
  display: block;
  clear: both;
  content: "";
}

.carousel-item {
  position: relative;
  display: none;
  float: left;
  width: 100%;
  margin-right: -100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  transition: -webkit-transform 0.6s ease-in-out;
  transition: transform 0.6s ease-in-out;
  transition: transform 0.6s ease-in-out, -webkit-transform 0.6s ease-in-out;
}

@media (prefers-reduced-motion: reduce) {
  .carousel-item {
    transition: none;
  }
}

.carousel-item.active,
.carousel-item-next,
.carousel-item-prev {
  display: block;
}

.carousel-item-next:not(.carousel-item-left),
.active.carousel-item-right {
  -webkit-transform: translateX(100%);
  transform: translateX(100%);
}

.carousel-item-prev:not(.carousel-item-right),
.active.carousel-item-left {
  -webkit-transform: translateX(-100%);
  transform: translateX(-100%);
}

.carousel-fade .carousel-item {
  opacity: 0;
  transition-property: opacity;
  -webkit-transform: none;
  transform: none;
}

.carousel-fade .carousel-item.active,
.carousel-fade .carousel-item-next.carousel-item-left,
.carousel-fade .carousel-item-prev.carousel-item-right {
  z-index: 1;
  opacity: 1;
}

.carousel-fade .active.carousel-item-left,
.carousel-fade .active.carousel-item-right {
  z-index: 0;
  opacity: 0;
  transition: 0s 0.6s opacity;
}

@media (prefers-reduced-motion: reduce) {
  .carousel-fade .active.carousel-item-left,
  .carousel-fade .active.carousel-item-right {
    transition: none;
  }
}

.carousel-control-prev,
.carousel-control-next {
  position: absolute;
  top: 0;
  bottom: 0;
  z-index: 1;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  -ms-flex-pack: center;
  justify-content: center;
  width: 15%;
  color: #fff;
  text-align: center;
  opacity: 0.5;
  transition: opacity 0.15s ease;
}

@media (prefers-reduced-motion: reduce) {
  .carousel-control-prev,
  .carousel-control-next {
    transition: none;
  }
}

.carousel-control-prev:hover, .carousel-control-prev:focus,
.carousel-control-next:hover,
.carousel-control-next:focus {
  color: #fff;
  text-decoration: none;
  outline: 0;
  opacity: 0.9;
}

.carousel-control-prev {
  left: 0;
}

.carousel-control-next {
  right: 0;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
  display: inline-block;
  width: 20px;
  height: 20px;
  background: no-repeat 50% / 100% 100%;
}

.carousel-control-prev-icon {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3e%3c/svg%3e");
}

.carousel-control-next-icon {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3e%3c/svg%3e");
}

.carousel-indicators {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 15;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-pack: center;
  justify-content: center;
  padding-left: 0;
  margin-right: 15%;
  margin-left: 15%;
  list-style: none;
}

.carousel-indicators li {
  box-sizing: content-box;
  -ms-flex: 0 1 auto;
  flex: 0 1 auto;
  width: 30px;
  height: 3px;
  margin-right: 3px;
  margin-left: 3px;
  text-indent: -999px;
  cursor: pointer;
  background-color: #fff;
  background-clip: padding-box;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  opacity: .5;
  transition: opacity 0.6s ease;
}

@media (prefers-reduced-motion: reduce) {
  .carousel-indicators li {
    transition: none;
  }
}

.carousel-indicators .active {
  opacity: 1;
}

.carousel-caption {
  position: absolute;
  right: 15%;
  bottom: 20px;
  left: 15%;
  z-index: 10;
  padding-top: 20px;
  padding-bottom: 20px;
  color: #fff;
  text-align: center;
}

@-webkit-keyframes spinner-border {
  to {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

@keyframes spinner-border {
  to {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

.spinner-border {
  display: inline-block;
  width: 2rem;
  height: 2rem;
  vertical-align: text-bottom;
  border: 0.25em solid currentColor;
  border-right-color: transparent;
  border-radius: 50%;
  -webkit-animation: spinner-border .75s linear infinite;
  animation: spinner-border .75s linear infinite;
}

.spinner-border-sm {
  width: 1rem;
  height: 1rem;
  border-width: 0.2em;
}

@-webkit-keyframes spinner-grow {
  0% {
    -webkit-transform: scale(0);
    transform: scale(0);
  }
  50% {
    opacity: 1;
  }
}

@keyframes spinner-grow {
  0% {
    -webkit-transform: scale(0);
    transform: scale(0);
  }
  50% {
    opacity: 1;
  }
}

.spinner-grow {
  display: inline-block;
  width: 2rem;
  height: 2rem;
  vertical-align: text-bottom;
  background-color: currentColor;
  border-radius: 50%;
  opacity: 0;
  -webkit-animation: spinner-grow .75s linear infinite;
  animation: spinner-grow .75s linear infinite;
}

.spinner-grow-sm {
  width: 1rem;
  height: 1rem;
}

.align-baseline {
  vertical-align: baseline !important;
}

.align-top {
  vertical-align: top !important;
}

.align-middle {
  vertical-align: middle !important;
}

.align-bottom {
  vertical-align: bottom !important;
}

.align-text-bottom {
  vertical-align: text-bottom !important;
}

.align-text-top {
  vertical-align: text-top !important;
}

.bg-primary {
  background-color: #20a8d8 !important;
}

a.bg-primary:hover, a.bg-primary:focus,
button.bg-primary:hover,
button.bg-primary:focus {
  background-color: #1985ac !important;
}

.bg-secondary {
  background-color: #c8ced3 !important;
}

a.bg-secondary:hover, a.bg-secondary:focus,
button.bg-secondary:hover,
button.bg-secondary:focus {
  background-color: #acb5bc !important;
}

.bg-success {
  background-color: #36c6d3 !important;
}

a.bg-success:hover, a.bg-success:focus,
button.bg-success:hover,
button.bg-success:focus {
  background-color: #36c6d3 !important;
}

.bg-info {
  background-color: #63c2de !important;
}

a.bg-info:hover, a.bg-info:focus,
button.bg-info:hover,
button.bg-info:focus {
  background-color: #39b2d5 !important;
}

.bg-warning {
  background-color: #ffc107 !important;
}

a.bg-warning:hover, a.bg-warning:focus,
button.bg-warning:hover,
button.bg-warning:focus {
  background-color: #d39e00 !important;
}

.bg-danger {
  background-color: #f86c6b !important;
}

a.bg-danger:hover, a.bg-danger:focus,
button.bg-danger:hover,
button.bg-danger:focus {
  background-color: #f63c3a !important;
}

.bg-light {
  background-color: #f0f3f5 !important;
}

a.bg-light:hover, a.bg-light:focus,
button.bg-light:hover,
button.bg-light:focus {
  background-color: #d1dbe1 !important;
}

.bg-dark {
  background-color: #2f353a !important;
}

a.bg-dark:hover, a.bg-dark:focus,
button.bg-dark:hover,
button.bg-dark:focus {
  background-color: #181b1e !important;
}

.bg-white {
  background-color: #fff !important;
}

.bg-transparent {
  background-color: transparent !important;
}

.border {
  border: 1px solid #c8ced3 !important;
}

.border-top {
  border-top: 1px solid #c8ced3 !important;
}

.border-right {
  border-right: 1px solid #c8ced3 !important;
}

.border-bottom {
  border-bottom: 1px solid #c8ced3 !important;
}

.border-left {
  border-left: 1px solid #c8ced3 !important;
}

.border-0 {
  border: 0 !important;
}

.border-top-0 {
  border-top: 0 !important;
}

.border-right-0 {
  border-right: 0 !important;
}

.border-bottom-0 {
  border-bottom: 0 !important;
}

.border-left-0 {
  border-left: 0 !important;
}

.border-primary {
  border-color: #20a8d8 !important;
}

.border-secondary {
  border-color: #c8ced3 !important;
}

.border-success {
  border-color: #2bb8c4 !important;
}

.border-info {
  border-color: #63c2de !important;
}

.border-warning {
  border-color: #ffc107 !important;
}

.border-danger {
  border-color: #f86c6b !important;
}

.border-light {
  border-color: #f0f3f5 !important;
}

.border-dark {
  border-color: #2f353a !important;
}

.border-white {
  border-color: #fff !important;
}

.rounded-sm {
  border-radius: 0.2rem !important;
}

.rounded {
  border-radius: 0.25rem !important;
}

.rounded-top {
  border-top-left-radius: 0.25rem !important;
  border-top-right-radius: 0.25rem !important;
}

.rounded-right {
  border-top-right-radius: 0.25rem !important;
  border-bottom-right-radius: 0.25rem !important;
}

.rounded-bottom {
  border-bottom-right-radius: 0.25rem !important;
  border-bottom-left-radius: 0.25rem !important;
}

.rounded-left {
  border-top-left-radius: 0.25rem !important;
  border-bottom-left-radius: 0.25rem !important;
}

.rounded-lg {
  border-radius: 0.3rem !important;
}

.rounded-circle {
  border-radius: 50% !important;
}

.rounded-pill {
  border-radius: 50rem !important;
}

.rounded-0 {
  border-radius: 0 !important;
}

.clearfix::after {
  display: block;
  clear: both;
  content: "";
}

.d-none {
  display: none !important;
}

.d-inline {
  display: inline !important;
}

.d-inline-block {
  display: inline-block !important;
}

.d-block {
  display: block !important;
}

.d-table {
  display: table !important;
}

.d-table-row {
  display: table-row !important;
}

.d-table-cell {
  display: table-cell !important;
}

.d-flex {
  display: -ms-flexbox !important;
  display: flex !important;
}

.d-inline-flex {
  display: -ms-inline-flexbox !important;
  display: inline-flex !important;
}

@media (min-width: 576px) {
  .d-sm-none {
    display: none !important;
  }
  .d-sm-inline {
    display: inline !important;
  }
  .d-sm-inline-block {
    display: inline-block !important;
  }
  .d-sm-block {
    display: block !important;
  }
  .d-sm-table {
    display: table !important;
  }
  .d-sm-table-row {
    display: table-row !important;
  }
  .d-sm-table-cell {
    display: table-cell !important;
  }
  .d-sm-flex {
    display: -ms-flexbox !important;
    display: flex !important;
  }
  .d-sm-inline-flex {
    display: -ms-inline-flexbox !important;
    display: inline-flex !important;
  }
}

@media (min-width: 768px) {
  .d-md-none {
    display: none !important;
  }
  .d-md-inline {
    display: inline !important;
  }
  .d-md-inline-block {
    display: inline-block !important;
  }
  .d-md-block {
    display: block !important;
  }
  .d-md-table {
    display: table !important;
  }
  .d-md-table-row {
    display: table-row !important;
  }
  .d-md-table-cell {
    display: table-cell !important;
  }
  .d-md-flex {
    display: -ms-flexbox !important;
    display: flex !important;
  }
  .d-md-inline-flex {
    display: -ms-inline-flexbox !important;
    display: inline-flex !important;
  }
}

@media (min-width: 992px) {
  .d-lg-none {
    display: none !important;
  }
  .d-lg-inline {
    display: inline !important;
  }
  .d-lg-inline-block {
    display: inline-block !important;
  }
  .d-lg-block {
    display: block !important;
  }
  .d-lg-table {
    display: table !important;
  }
  .d-lg-table-row {
    display: table-row !important;
  }
  .d-lg-table-cell {
    display: table-cell !important;
  }
  .d-lg-flex {
    display: -ms-flexbox !important;
    display: flex !important;
  }
  .d-lg-inline-flex {
    display: -ms-inline-flexbox !important;
    display: inline-flex !important;
  }
}

@media (min-width: 1200px) {
  .d-xl-none {
    display: none !important;
  }
  .d-xl-inline {
    display: inline !important;
  }
  .d-xl-inline-block {
    display: inline-block !important;
  }
  .d-xl-block {
    display: block !important;
  }
  .d-xl-table {
    display: table !important;
  }
  .d-xl-table-row {
    display: table-row !important;
  }
  .d-xl-table-cell {
    display: table-cell !important;
  }
  .d-xl-flex {
    display: -ms-flexbox !important;
    display: flex !important;
  }
  .d-xl-inline-flex {
    display: -ms-inline-flexbox !important;
    display: inline-flex !important;
  }
}

@media print {
  .d-print-none {
    display: none !important;
  }
  .d-print-inline {
    display: inline !important;
  }
  .d-print-inline-block {
    display: inline-block !important;
  }
  .d-print-block {
    display: block !important;
  }
  .d-print-table {
    display: table !important;
  }
  .d-print-table-row {
    display: table-row !important;
  }
  .d-print-table-cell {
    display: table-cell !important;
  }
  .d-print-flex {
    display: -ms-flexbox !important;
    display: flex !important;
  }
  .d-print-inline-flex {
    display: -ms-inline-flexbox !important;
    display: inline-flex !important;
  }
}

.embed-responsive {
  position: relative;
  display: block;
  width: 100%;
  padding: 0;
  overflow: hidden;
}

.embed-responsive::before {
  display: block;
  content: "";
}

.embed-responsive .embed-responsive-item,
.embed-responsive iframe,
.embed-responsive embed,
.embed-responsive object,
.embed-responsive video {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border: 0;
}

.embed-responsive-21by9::before {
  padding-top: 42.857143%;
}

.embed-responsive-16by9::before {
  padding-top: 56.25%;
}

.embed-responsive-4by3::before {
  padding-top: 75%;
}

.embed-responsive-1by1::before {
  padding-top: 100%;
}

.embed-responsive-21by9::before {
  padding-top: 42.857143%;
}

.embed-responsive-16by9::before {
  padding-top: 56.25%;
}

.embed-responsive-4by3::before {
  padding-top: 75%;
}

.embed-responsive-1by1::before {
  padding-top: 100%;
}

.flex-row {
  -ms-flex-direction: row !important;
  flex-direction: row !important;
}

.flex-column {
  -ms-flex-direction: column !important;
  flex-direction: column !important;
}

.flex-row-reverse {
  -ms-flex-direction: row-reverse !important;
  flex-direction: row-reverse !important;
}

.flex-column-reverse {
  -ms-flex-direction: column-reverse !important;
  flex-direction: column-reverse !important;
}

.flex-wrap {
  -ms-flex-wrap: wrap !important;
  flex-wrap: wrap !important;
}

.flex-nowrap {
  -ms-flex-wrap: nowrap !important;
  flex-wrap: nowrap !important;
}

.flex-wrap-reverse {
  -ms-flex-wrap: wrap-reverse !important;
  flex-wrap: wrap-reverse !important;
}

.flex-fill {
  -ms-flex: 1 1 auto !important;
  flex: 1 1 auto !important;
}

.flex-grow-0 {
  -ms-flex-positive: 0 !important;
  flex-grow: 0 !important;
}

.flex-grow-1 {
  -ms-flex-positive: 1 !important;
  flex-grow: 1 !important;
}

.flex-shrink-0 {
  -ms-flex-negative: 0 !important;
  flex-shrink: 0 !important;
}

.flex-shrink-1 {
  -ms-flex-negative: 1 !important;
  flex-shrink: 1 !important;
}

.justify-content-start {
  -ms-flex-pack: start !important;
  justify-content: flex-start !important;
}

.justify-content-end {
  -ms-flex-pack: end !important;
  justify-content: flex-end !important;
}

.justify-content-center {
  -ms-flex-pack: center !important;
  justify-content: center !important;
}

.justify-content-between {
  -ms-flex-pack: justify !important;
  justify-content: space-between !important;
}

.justify-content-around {
  -ms-flex-pack: distribute !important;
  justify-content: space-around !important;
}

.align-items-start {
  -ms-flex-align: start !important;
  align-items: flex-start !important;
}

.align-items-end {
  -ms-flex-align: end !important;
  align-items: flex-end !important;
}

.align-items-center {
  -ms-flex-align: center !important;
  align-items: center !important;
}

.align-items-baseline {
  -ms-flex-align: baseline !important;
  align-items: baseline !important;
}

.align-items-stretch {
  -ms-flex-align: stretch !important;
  align-items: stretch !important;
}

.align-content-start {
  -ms-flex-line-pack: start !important;
  align-content: flex-start !important;
}

.align-content-end {
  -ms-flex-line-pack: end !important;
  align-content: flex-end !important;
}

.align-content-center {
  -ms-flex-line-pack: center !important;
  align-content: center !important;
}

.align-content-between {
  -ms-flex-line-pack: justify !important;
  align-content: space-between !important;
}

.align-content-around {
  -ms-flex-line-pack: distribute !important;
  align-content: space-around !important;
}

.align-content-stretch {
  -ms-flex-line-pack: stretch !important;
  align-content: stretch !important;
}

.align-self-auto {
  -ms-flex-item-align: auto !important;
  align-self: auto !important;
}

.align-self-start {
  -ms-flex-item-align: start !important;
  align-self: flex-start !important;
}

.align-self-end {
  -ms-flex-item-align: end !important;
  align-self: flex-end !important;
}

.align-self-center {
  -ms-flex-item-align: center !important;
  align-self: center !important;
}

.align-self-baseline {
  -ms-flex-item-align: baseline !important;
  align-self: baseline !important;
}

.align-self-stretch {
  -ms-flex-item-align: stretch !important;
  align-self: stretch !important;
}

@media (min-width: 576px) {
  .flex-sm-row {
    -ms-flex-direction: row !important;
    flex-direction: row !important;
  }
  .flex-sm-column {
    -ms-flex-direction: column !important;
    flex-direction: column !important;
  }
  .flex-sm-row-reverse {
    -ms-flex-direction: row-reverse !important;
    flex-direction: row-reverse !important;
  }
  .flex-sm-column-reverse {
    -ms-flex-direction: column-reverse !important;
    flex-direction: column-reverse !important;
  }
  .flex-sm-wrap {
    -ms-flex-wrap: wrap !important;
    flex-wrap: wrap !important;
  }
  .flex-sm-nowrap {
    -ms-flex-wrap: nowrap !important;
    flex-wrap: nowrap !important;
  }
  .flex-sm-wrap-reverse {
    -ms-flex-wrap: wrap-reverse !important;
    flex-wrap: wrap-reverse !important;
  }
  .flex-sm-fill {
    -ms-flex: 1 1 auto !important;
    flex: 1 1 auto !important;
  }
  .flex-sm-grow-0 {
    -ms-flex-positive: 0 !important;
    flex-grow: 0 !important;
  }
  .flex-sm-grow-1 {
    -ms-flex-positive: 1 !important;
    flex-grow: 1 !important;
  }
  .flex-sm-shrink-0 {
    -ms-flex-negative: 0 !important;
    flex-shrink: 0 !important;
  }
  .flex-sm-shrink-1 {
    -ms-flex-negative: 1 !important;
    flex-shrink: 1 !important;
  }
  .justify-content-sm-start {
    -ms-flex-pack: start !important;
    justify-content: flex-start !important;
  }
  .justify-content-sm-end {
    -ms-flex-pack: end !important;
    justify-content: flex-end !important;
  }
  .justify-content-sm-center {
    -ms-flex-pack: center !important;
    justify-content: center !important;
  }
  .justify-content-sm-between {
    -ms-flex-pack: justify !important;
    justify-content: space-between !important;
  }
  .justify-content-sm-around {
    -ms-flex-pack: distribute !important;
    justify-content: space-around !important;
  }
  .align-items-sm-start {
    -ms-flex-align: start !important;
    align-items: flex-start !important;
  }
  .align-items-sm-end {
    -ms-flex-align: end !important;
    align-items: flex-end !important;
  }
  .align-items-sm-center {
    -ms-flex-align: center !important;
    align-items: center !important;
  }
  .align-items-sm-baseline {
    -ms-flex-align: baseline !important;
    align-items: baseline !important;
  }
  .align-items-sm-stretch {
    -ms-flex-align: stretch !important;
    align-items: stretch !important;
  }
  .align-content-sm-start {
    -ms-flex-line-pack: start !important;
    align-content: flex-start !important;
  }
  .align-content-sm-end {
    -ms-flex-line-pack: end !important;
    align-content: flex-end !important;
  }
  .align-content-sm-center {
    -ms-flex-line-pack: center !important;
    align-content: center !important;
  }
  .align-content-sm-between {
    -ms-flex-line-pack: justify !important;
    align-content: space-between !important;
  }
  .align-content-sm-around {
    -ms-flex-line-pack: distribute !important;
    align-content: space-around !important;
  }
  .align-content-sm-stretch {
    -ms-flex-line-pack: stretch !important;
    align-content: stretch !important;
  }
  .align-self-sm-auto {
    -ms-flex-item-align: auto !important;
    align-self: auto !important;
  }
  .align-self-sm-start {
    -ms-flex-item-align: start !important;
    align-self: flex-start !important;
  }
  .align-self-sm-end {
    -ms-flex-item-align: end !important;
    align-self: flex-end !important;
  }
  .align-self-sm-center {
    -ms-flex-item-align: center !important;
    align-self: center !important;
  }
  .align-self-sm-baseline {
    -ms-flex-item-align: baseline !important;
    align-self: baseline !important;
  }
  .align-self-sm-stretch {
    -ms-flex-item-align: stretch !important;
    align-self: stretch !important;
  }
}

@media (min-width: 768px) {
  .flex-md-row {
    -ms-flex-direction: row !important;
    flex-direction: row !important;
  }
  .flex-md-column {
    -ms-flex-direction: column !important;
    flex-direction: column !important;
  }
  .flex-md-row-reverse {
    -ms-flex-direction: row-reverse !important;
    flex-direction: row-reverse !important;
  }
  .flex-md-column-reverse {
    -ms-flex-direction: column-reverse !important;
    flex-direction: column-reverse !important;
  }
  .flex-md-wrap {
    -ms-flex-wrap: wrap !important;
    flex-wrap: wrap !important;
  }
  .flex-md-nowrap {
    -ms-flex-wrap: nowrap !important;
    flex-wrap: nowrap !important;
  }
  .flex-md-wrap-reverse {
    -ms-flex-wrap: wrap-reverse !important;
    flex-wrap: wrap-reverse !important;
  }
  .flex-md-fill {
    -ms-flex: 1 1 auto !important;
    flex: 1 1 auto !important;
  }
  .flex-md-grow-0 {
    -ms-flex-positive: 0 !important;
    flex-grow: 0 !important;
  }
  .flex-md-grow-1 {
    -ms-flex-positive: 1 !important;
    flex-grow: 1 !important;
  }
  .flex-md-shrink-0 {
    -ms-flex-negative: 0 !important;
    flex-shrink: 0 !important;
  }
  .flex-md-shrink-1 {
    -ms-flex-negative: 1 !important;
    flex-shrink: 1 !important;
  }
  .justify-content-md-start {
    -ms-flex-pack: start !important;
    justify-content: flex-start !important;
  }
  .justify-content-md-end {
    -ms-flex-pack: end !important;
    justify-content: flex-end !important;
  }
  .justify-content-md-center {
    -ms-flex-pack: center !important;
    justify-content: center !important;
  }
  .justify-content-md-between {
    -ms-flex-pack: justify !important;
    justify-content: space-between !important;
  }
  .justify-content-md-around {
    -ms-flex-pack: distribute !important;
    justify-content: space-around !important;
  }
  .align-items-md-start {
    -ms-flex-align: start !important;
    align-items: flex-start !important;
  }
  .align-items-md-end {
    -ms-flex-align: end !important;
    align-items: flex-end !important;
  }
  .align-items-md-center {
    -ms-flex-align: center !important;
    align-items: center !important;
  }
  .align-items-md-baseline {
    -ms-flex-align: baseline !important;
    align-items: baseline !important;
  }
  .align-items-md-stretch {
    -ms-flex-align: stretch !important;
    align-items: stretch !important;
  }
  .align-content-md-start {
    -ms-flex-line-pack: start !important;
    align-content: flex-start !important;
  }
  .align-content-md-end {
    -ms-flex-line-pack: end !important;
    align-content: flex-end !important;
  }
  .align-content-md-center {
    -ms-flex-line-pack: center !important;
    align-content: center !important;
  }
  .align-content-md-between {
    -ms-flex-line-pack: justify !important;
    align-content: space-between !important;
  }
  .align-content-md-around {
    -ms-flex-line-pack: distribute !important;
    align-content: space-around !important;
  }
  .align-content-md-stretch {
    -ms-flex-line-pack: stretch !important;
    align-content: stretch !important;
  }
  .align-self-md-auto {
    -ms-flex-item-align: auto !important;
    align-self: auto !important;
  }
  .align-self-md-start {
    -ms-flex-item-align: start !important;
    align-self: flex-start !important;
  }
  .align-self-md-end {
    -ms-flex-item-align: end !important;
    align-self: flex-end !important;
  }
  .align-self-md-center {
    -ms-flex-item-align: center !important;
    align-self: center !important;
  }
  .align-self-md-baseline {
    -ms-flex-item-align: baseline !important;
    align-self: baseline !important;
  }
  .align-self-md-stretch {
    -ms-flex-item-align: stretch !important;
    align-self: stretch !important;
  }
}

@media (min-width: 992px) {
  .flex-lg-row {
    -ms-flex-direction: row !important;
    flex-direction: row !important;
  }
  .flex-lg-column {
    -ms-flex-direction: column !important;
    flex-direction: column !important;
  }
  .flex-lg-row-reverse {
    -ms-flex-direction: row-reverse !important;
    flex-direction: row-reverse !important;
  }
  .flex-lg-column-reverse {
    -ms-flex-direction: column-reverse !important;
    flex-direction: column-reverse !important;
  }
  .flex-lg-wrap {
    -ms-flex-wrap: wrap !important;
    flex-wrap: wrap !important;
  }
  .flex-lg-nowrap {
    -ms-flex-wrap: nowrap !important;
    flex-wrap: nowrap !important;
  }
  .flex-lg-wrap-reverse {
    -ms-flex-wrap: wrap-reverse !important;
    flex-wrap: wrap-reverse !important;
  }
  .flex-lg-fill {
    -ms-flex: 1 1 auto !important;
    flex: 1 1 auto !important;
  }
  .flex-lg-grow-0 {
    -ms-flex-positive: 0 !important;
    flex-grow: 0 !important;
  }
  .flex-lg-grow-1 {
    -ms-flex-positive: 1 !important;
    flex-grow: 1 !important;
  }
  .flex-lg-shrink-0 {
    -ms-flex-negative: 0 !important;
    flex-shrink: 0 !important;
  }
  .flex-lg-shrink-1 {
    -ms-flex-negative: 1 !important;
    flex-shrink: 1 !important;
  }
  .justify-content-lg-start {
    -ms-flex-pack: start !important;
    justify-content: flex-start !important;
  }
  .justify-content-lg-end {
    -ms-flex-pack: end !important;
    justify-content: flex-end !important;
  }
  .justify-content-lg-center {
    -ms-flex-pack: center !important;
    justify-content: center !important;
  }
  .justify-content-lg-between {
    -ms-flex-pack: justify !important;
    justify-content: space-between !important;
  }
  .justify-content-lg-around {
    -ms-flex-pack: distribute !important;
    justify-content: space-around !important;
  }
  .align-items-lg-start {
    -ms-flex-align: start !important;
    align-items: flex-start !important;
  }
  .align-items-lg-end {
    -ms-flex-align: end !important;
    align-items: flex-end !important;
  }
  .align-items-lg-center {
    -ms-flex-align: center !important;
    align-items: center !important;
  }
  .align-items-lg-baseline {
    -ms-flex-align: baseline !important;
    align-items: baseline !important;
  }
  .align-items-lg-stretch {
    -ms-flex-align: stretch !important;
    align-items: stretch !important;
  }
  .align-content-lg-start {
    -ms-flex-line-pack: start !important;
    align-content: flex-start !important;
  }
  .align-content-lg-end {
    -ms-flex-line-pack: end !important;
    align-content: flex-end !important;
  }
  .align-content-lg-center {
    -ms-flex-line-pack: center !important;
    align-content: center !important;
  }
  .align-content-lg-between {
    -ms-flex-line-pack: justify !important;
    align-content: space-between !important;
  }
  .align-content-lg-around {
    -ms-flex-line-pack: distribute !important;
    align-content: space-around !important;
  }
  .align-content-lg-stretch {
    -ms-flex-line-pack: stretch !important;
    align-content: stretch !important;
  }
  .align-self-lg-auto {
    -ms-flex-item-align: auto !important;
    align-self: auto !important;
  }
  .align-self-lg-start {
    -ms-flex-item-align: start !important;
    align-self: flex-start !important;
  }
  .align-self-lg-end {
    -ms-flex-item-align: end !important;
    align-self: flex-end !important;
  }
  .align-self-lg-center {
    -ms-flex-item-align: center !important;
    align-self: center !important;
  }
  .align-self-lg-baseline {
    -ms-flex-item-align: baseline !important;
    align-self: baseline !important;
  }
  .align-self-lg-stretch {
    -ms-flex-item-align: stretch !important;
    align-self: stretch !important;
  }
}

@media (min-width: 1200px) {
  .flex-xl-row {
    -ms-flex-direction: row !important;
    flex-direction: row !important;
  }
  .flex-xl-column {
    -ms-flex-direction: column !important;
    flex-direction: column !important;
  }
  .flex-xl-row-reverse {
    -ms-flex-direction: row-reverse !important;
    flex-direction: row-reverse !important;
  }
  .flex-xl-column-reverse {
    -ms-flex-direction: column-reverse !important;
    flex-direction: column-reverse !important;
  }
  .flex-xl-wrap {
    -ms-flex-wrap: wrap !important;
    flex-wrap: wrap !important;
  }
  .flex-xl-nowrap {
    -ms-flex-wrap: nowrap !important;
    flex-wrap: nowrap !important;
  }
  .flex-xl-wrap-reverse {
    -ms-flex-wrap: wrap-reverse !important;
    flex-wrap: wrap-reverse !important;
  }
  .flex-xl-fill {
    -ms-flex: 1 1 auto !important;
    flex: 1 1 auto !important;
  }
  .flex-xl-grow-0 {
    -ms-flex-positive: 0 !important;
    flex-grow: 0 !important;
  }
  .flex-xl-grow-1 {
    -ms-flex-positive: 1 !important;
    flex-grow: 1 !important;
  }
  .flex-xl-shrink-0 {
    -ms-flex-negative: 0 !important;
    flex-shrink: 0 !important;
  }
  .flex-xl-shrink-1 {
    -ms-flex-negative: 1 !important;
    flex-shrink: 1 !important;
  }
  .justify-content-xl-start {
    -ms-flex-pack: start !important;
    justify-content: flex-start !important;
  }
  .justify-content-xl-end {
    -ms-flex-pack: end !important;
    justify-content: flex-end !important;
  }
  .justify-content-xl-center {
    -ms-flex-pack: center !important;
    justify-content: center !important;
  }
  .justify-content-xl-between {
    -ms-flex-pack: justify !important;
    justify-content: space-between !important;
  }
  .justify-content-xl-around {
    -ms-flex-pack: distribute !important;
    justify-content: space-around !important;
  }
  .align-items-xl-start {
    -ms-flex-align: start !important;
    align-items: flex-start !important;
  }
  .align-items-xl-end {
    -ms-flex-align: end !important;
    align-items: flex-end !important;
  }
  .align-items-xl-center {
    -ms-flex-align: center !important;
    align-items: center !important;
  }
  .align-items-xl-baseline {
    -ms-flex-align: baseline !important;
    align-items: baseline !important;
  }
  .align-items-xl-stretch {
    -ms-flex-align: stretch !important;
    align-items: stretch !important;
  }
  .align-content-xl-start {
    -ms-flex-line-pack: start !important;
    align-content: flex-start !important;
  }
  .align-content-xl-end {
    -ms-flex-line-pack: end !important;
    align-content: flex-end !important;
  }
  .align-content-xl-center {
    -ms-flex-line-pack: center !important;
    align-content: center !important;
  }
  .align-content-xl-between {
    -ms-flex-line-pack: justify !important;
    align-content: space-between !important;
  }
  .align-content-xl-around {
    -ms-flex-line-pack: distribute !important;
    align-content: space-around !important;
  }
  .align-content-xl-stretch {
    -ms-flex-line-pack: stretch !important;
    align-content: stretch !important;
  }
  .align-self-xl-auto {
    -ms-flex-item-align: auto !important;
    align-self: auto !important;
  }
  .align-self-xl-start {
    -ms-flex-item-align: start !important;
    align-self: flex-start !important;
  }
  .align-self-xl-end {
    -ms-flex-item-align: end !important;
    align-self: flex-end !important;
  }
  .align-self-xl-center {
    -ms-flex-item-align: center !important;
    align-self: center !important;
  }
  .align-self-xl-baseline {
    -ms-flex-item-align: baseline !important;
    align-self: baseline !important;
  }
  .align-self-xl-stretch {
    -ms-flex-item-align: stretch !important;
    align-self: stretch !important;
  }
}

.float-left {
  float: left !important;
}

.float-right {
  float: right !important;
}

.float-none {
  float: none !important;
}

@media (min-width: 576px) {
  .float-sm-left {
    float: left !important;
  }
  .float-sm-right {
    float: right !important;
  }
  .float-sm-none {
    float: none !important;
  }
}

@media (min-width: 768px) {
  .float-md-left {
    float: left !important;
  }
  .float-md-right {
    float: right !important;
  }
  .float-md-none {
    float: none !important;
  }
}

@media (min-width: 992px) {
  .float-lg-left {
    float: left !important;
  }
  .float-lg-right {
    float: right !important;
  }
  .float-lg-none {
    float: none !important;
  }
}

@media (min-width: 1200px) {
  .float-xl-left {
    float: left !important;
  }
  .float-xl-right {
    float: right !important;
  }
  .float-xl-none {
    float: none !important;
  }
}

.overflow-auto {
  overflow: auto !important;
}

.overflow-hidden {
  overflow: hidden !important;
}

.position-static {
  position: static !important;
}

.position-relative {
  position: relative !important;
}

.position-absolute {
  position: absolute !important;
}

.position-fixed {
  position: fixed !important;
}

.position-sticky {
  position: -webkit-sticky !important;
  position: sticky !important;
}

.fixed-top {
  position: fixed;
  top: 0;
  right: 0;
  left: 0;
  z-index: 1030;
}

.fixed-bottom {
  position: fixed;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1030;
}

@supports ((position: -webkit-sticky) or (position: sticky)) {
  .sticky-top {
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    z-index: 1020;
  }
}

.sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  white-space: nowrap;
  border: 0;
}

.sr-only-focusable:active, .sr-only-focusable:focus {
  position: static;
  width: auto;
  height: auto;
  overflow: visible;
  clip: auto;
  white-space: normal;
}

.shadow-sm {
  box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
}

.shadow {
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
}

.shadow-lg {
  box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
}

.shadow-none {
  box-shadow: none !important;
}

.w-25 {
  width: 25% !important;
}

.w-50 {
  width: 50% !important;
}

.w-75 {
  width: 75% !important;
}

.w-100 {
  width: 100% !important;
}

.w-auto {
  width: auto !important;
}

.h-25 {
  height: 25% !important;
}

.h-50 {
  height: 50% !important;
}

.h-75 {
  height: 75% !important;
}

.h-100 {
  height: 100% !important;
}

.h-auto {
  height: auto !important;
}

.mw-100 {
  max-width: 100% !important;
}

.mh-100 {
  max-height: 100% !important;
}

.min-vw-100 {
  min-width: 100vw !important;
}

.min-vh-100 {
  min-height: 100vh !important;
}

.vw-100 {
  width: 100vw !important;
}

.vh-100 {
  height: 100vh !important;
}

.stretched-link::after {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1;
  pointer-events: auto;
  content: "";
  background-color: rgba(0, 0, 0, 0);
}

.m-0 {
  margin: 0 !important;
}

.mt-0,
.my-0 {
  margin-top: 0 !important;
}

.mr-0,
.mx-0 {
  margin-right: 0 !important;
}

.mb-0,
.my-0 {
  margin-bottom: 0 !important;
}

.ml-0,
.mx-0 {
  margin-left: 0 !important;
}

.m-1 {
  margin: 0.25rem !important;
}

.mt-1,
.my-1 {
  margin-top: 0.25rem !important;
}

.mr-1,
.mx-1 {
  margin-right: 0.25rem !important;
}

.mb-1,
.my-1 {
  margin-bottom: 0.25rem !important;
}

.ml-1,
.mx-1 {
  margin-left: 0.25rem !important;
}

.m-2 {
  margin: 0.5rem !important;
}

.mt-2,
.my-2 {
  margin-top: 0.5rem !important;
}

.mr-2,
.mx-2 {
  margin-right: 0.5rem !important;
}

.mb-2,
.my-2 {
  margin-bottom: 0.5rem !important;
}

.ml-2,
.mx-2 {
  margin-left: 0.5rem !important;
}

.m-3 {
  margin: 1rem !important;
}

.mt-3,
.my-3 {
  margin-top: 1rem !important;
}

.mr-3,
.mx-3 {
  margin-right: 1rem !important;
}

.mb-3,
.my-3 {
  margin-bottom: 1rem !important;
}

.ml-3,
.mx-3 {
  margin-left: 1rem !important;
}

.m-4 {
  margin: 1.5rem !important;
}

.mt-4,
.my-4 {
  margin-top: 1.5rem !important;
}

.mr-4,
.mx-4 {
  margin-right: 1.5rem !important;
}

.mb-4,
.my-4 {
  margin-bottom: 1.5rem !important;
}

.ml-4,
.mx-4 {
  margin-left: 1.5rem !important;
}

.m-5 {
  margin: 3rem !important;
}

.mt-5,
.my-5 {
  margin-top: 3rem !important;
}

.mr-5,
.mx-5 {
  margin-right: 3rem !important;
}

.mb-5,
.my-5 {
  margin-bottom: 3rem !important;
}

.ml-5,
.mx-5 {
  margin-left: 3rem !important;
}

.p-0 {
  padding: 0 !important;
}

.pt-0,
.py-0 {
  padding-top: 0 !important;
}

.pr-0,
.px-0 {
  padding-right: 0 !important;
}

.pb-0,
.py-0 {
  padding-bottom: 0 !important;
}

.pl-0,
.px-0 {
  padding-left: 0 !important;
}

.p-1 {
  padding: 0.25rem !important;
}

.pt-1,
.py-1 {
  padding-top: 0.25rem !important;
}

.pr-1,
.px-1 {
  padding-right: 0.25rem !important;
}

.pb-1,
.py-1 {
  padding-bottom: 0.25rem !important;
}

.pl-1,
.px-1 {
  padding-left: 0.25rem !important;
}

.p-2 {
  padding: 0.5rem !important;
}

.pt-2,
.py-2 {
  padding-top: 0.5rem !important;
}

.pr-2,
.px-2 {
  padding-right: 0.5rem !important;
}

.pb-2,
.py-2 {
  padding-bottom: 0.5rem !important;
}

.pl-2,
.px-2 {
  padding-left: 0.5rem !important;
}

.p-3 {
  padding: 1rem !important;
}

.pt-3,
.py-3 {
  padding-top: 1rem !important;
}

.pr-3,
.px-3 {
  padding-right: 1rem !important;
}

.pb-3,
.py-3 {
  padding-bottom: 1rem !important;
}

.pl-3,
.px-3 {
  padding-left: 1rem !important;
}

.p-4 {
  padding: 1.5rem !important;
}

.pt-4,
.py-4 {
  padding-top: 1.5rem !important;
}

.pr-4,
.px-4 {
  padding-right: 1.5rem !important;
}

.pb-4,
.py-4 {
  padding-bottom: 1.5rem !important;
}

.pl-4,
.px-4 {
  padding-left: 1.5rem !important;
}

.p-5 {
  padding: 3rem !important;
}

.pt-5,
.py-5 {
  padding-top: 3rem !important;
}

.pr-5,
.px-5 {
  padding-right: 3rem !important;
}

.pb-5,
.py-5 {
  padding-bottom: 3rem !important;
}

.pl-5,
.px-5 {
  padding-left: 3rem !important;
}

.m-n1 {
  margin: -0.25rem !important;
}

.mt-n1,
.my-n1 {
  margin-top: -0.25rem !important;
}

.mr-n1,
.mx-n1 {
  margin-right: -0.25rem !important;
}

.mb-n1,
.my-n1 {
  margin-bottom: -0.25rem !important;
}

.ml-n1,
.mx-n1 {
  margin-left: -0.25rem !important;
}

.m-n2 {
  margin: -0.5rem !important;
}

.mt-n2,
.my-n2 {
  margin-top: -0.5rem !important;
}

.mr-n2,
.mx-n2 {
  margin-right: -0.5rem !important;
}

.mb-n2,
.my-n2 {
  margin-bottom: -0.5rem !important;
}

.ml-n2,
.mx-n2 {
  margin-left: -0.5rem !important;
}

.m-n3 {
  margin: -1rem !important;
}

.mt-n3,
.my-n3 {
  margin-top: -1rem !important;
}

.mr-n3,
.mx-n3 {
  margin-right: -1rem !important;
}

.mb-n3,
.my-n3 {
  margin-bottom: -1rem !important;
}

.ml-n3,
.mx-n3 {
  margin-left: -1rem !important;
}

.m-n4 {
  margin: -1.5rem !important;
}

.mt-n4,
.my-n4 {
  margin-top: -1.5rem !important;
}

.mr-n4,
.mx-n4 {
  margin-right: -1.5rem !important;
}

.mb-n4,
.my-n4 {
  margin-bottom: -1.5rem !important;
}

.ml-n4,
.mx-n4 {
  margin-left: -1.5rem !important;
}

.m-n5 {
  margin: -3rem !important;
}

.mt-n5,
.my-n5 {
  margin-top: -3rem !important;
}

.mr-n5,
.mx-n5 {
  margin-right: -3rem !important;
}

.mb-n5,
.my-n5 {
  margin-bottom: -3rem !important;
}

.ml-n5,
.mx-n5 {
  margin-left: -3rem !important;
}

.m-auto {
  margin: auto !important;
}

.mt-auto,
.my-auto {
  margin-top: auto !important;
}

.mr-auto,
.mx-auto {
  margin-right: auto !important;
}

.mb-auto,
.my-auto {
  margin-bottom: auto !important;
}

.ml-auto,
.mx-auto {
  margin-left: auto !important;
}

@media (min-width: 576px) {
  .m-sm-0 {
    margin: 0 !important;
  }
  .mt-sm-0,
  .my-sm-0 {
    margin-top: 0 !important;
  }
  .mr-sm-0,
  .mx-sm-0 {
    margin-right: 0 !important;
  }
  .mb-sm-0,
  .my-sm-0 {
    margin-bottom: 0 !important;
  }
  .ml-sm-0,
  .mx-sm-0 {
    margin-left: 0 !important;
  }
  .m-sm-1 {
    margin: 0.25rem !important;
  }
  .mt-sm-1,
  .my-sm-1 {
    margin-top: 0.25rem !important;
  }
  .mr-sm-1,
  .mx-sm-1 {
    margin-right: 0.25rem !important;
  }
  .mb-sm-1,
  .my-sm-1 {
    margin-bottom: 0.25rem !important;
  }
  .ml-sm-1,
  .mx-sm-1 {
    margin-left: 0.25rem !important;
  }
  .m-sm-2 {
    margin: 0.5rem !important;
  }
  .mt-sm-2,
  .my-sm-2 {
    margin-top: 0.5rem !important;
  }
  .mr-sm-2,
  .mx-sm-2 {
    margin-right: 0.5rem !important;
  }
  .mb-sm-2,
  .my-sm-2 {
    margin-bottom: 0.5rem !important;
  }
  .ml-sm-2,
  .mx-sm-2 {
    margin-left: 0.5rem !important;
  }
  .m-sm-3 {
    margin: 1rem !important;
  }
  .mt-sm-3,
  .my-sm-3 {
    margin-top: 1rem !important;
  }
  .mr-sm-3,
  .mx-sm-3 {
    margin-right: 1rem !important;
  }
  .mb-sm-3,
  .my-sm-3 {
    margin-bottom: 1rem !important;
  }
  .ml-sm-3,
  .mx-sm-3 {
    margin-left: 1rem !important;
  }
  .m-sm-4 {
    margin: 1.5rem !important;
  }
  .mt-sm-4,
  .my-sm-4 {
    margin-top: 1.5rem !important;
  }
  .mr-sm-4,
  .mx-sm-4 {
    margin-right: 1.5rem !important;
  }
  .mb-sm-4,
  .my-sm-4 {
    margin-bottom: 1.5rem !important;
  }
  .ml-sm-4,
  .mx-sm-4 {
    margin-left: 1.5rem !important;
  }
  .m-sm-5 {
    margin: 3rem !important;
  }
  .mt-sm-5,
  .my-sm-5 {
    margin-top: 3rem !important;
  }
  .mr-sm-5,
  .mx-sm-5 {
    margin-right: 3rem !important;
  }
  .mb-sm-5,
  .my-sm-5 {
    margin-bottom: 3rem !important;
  }
  .ml-sm-5,
  .mx-sm-5 {
    margin-left: 3rem !important;
  }
  .p-sm-0 {
    padding: 0 !important;
  }
  .pt-sm-0,
  .py-sm-0 {
    padding-top: 0 !important;
  }
  .pr-sm-0,
  .px-sm-0 {
    padding-right: 0 !important;
  }
  .pb-sm-0,
  .py-sm-0 {
    padding-bottom: 0 !important;
  }
  .pl-sm-0,
  .px-sm-0 {
    padding-left: 0 !important;
  }
  .p-sm-1 {
    padding: 0.25rem !important;
  }
  .pt-sm-1,
  .py-sm-1 {
    padding-top: 0.25rem !important;
  }
  .pr-sm-1,
  .px-sm-1 {
    padding-right: 0.25rem !important;
  }
  .pb-sm-1,
  .py-sm-1 {
    padding-bottom: 0.25rem !important;
  }
  .pl-sm-1,
  .px-sm-1 {
    padding-left: 0.25rem !important;
  }
  .p-sm-2 {
    padding: 0.5rem !important;
  }
  .pt-sm-2,
  .py-sm-2 {
    padding-top: 0.5rem !important;
  }
  .pr-sm-2,
  .px-sm-2 {
    padding-right: 0.5rem !important;
  }
  .pb-sm-2,
  .py-sm-2 {
    padding-bottom: 0.5rem !important;
  }
  .pl-sm-2,
  .px-sm-2 {
    padding-left: 0.5rem !important;
  }
  .p-sm-3 {
    padding: 1rem !important;
  }
  .pt-sm-3,
  .py-sm-3 {
    padding-top: 1rem !important;
  }
  .pr-sm-3,
  .px-sm-3 {
    padding-right: 1rem !important;
  }
  .pb-sm-3,
  .py-sm-3 {
    padding-bottom: 1rem !important;
  }
  .pl-sm-3,
  .px-sm-3 {
    padding-left: 1rem !important;
  }
  .p-sm-4 {
    padding: 1.5rem !important;
  }
  .pt-sm-4,
  .py-sm-4 {
    padding-top: 1.5rem !important;
  }
  .pr-sm-4,
  .px-sm-4 {
    padding-right: 1.5rem !important;
  }
  .pb-sm-4,
  .py-sm-4 {
    padding-bottom: 1.5rem !important;
  }
  .pl-sm-4,
  .px-sm-4 {
    padding-left: 1.5rem !important;
  }
  .p-sm-5 {
    padding: 3rem !important;
  }
  .pt-sm-5,
  .py-sm-5 {
    padding-top: 3rem !important;
  }
  .pr-sm-5,
  .px-sm-5 {
    padding-right: 3rem !important;
  }
  .pb-sm-5,
  .py-sm-5 {
    padding-bottom: 3rem !important;
  }
  .pl-sm-5,
  .px-sm-5 {
    padding-left: 3rem !important;
  }
  .m-sm-n1 {
    margin: -0.25rem !important;
  }
  .mt-sm-n1,
  .my-sm-n1 {
    margin-top: -0.25rem !important;
  }
  .mr-sm-n1,
  .mx-sm-n1 {
    margin-right: -0.25rem !important;
  }
  .mb-sm-n1,
  .my-sm-n1 {
    margin-bottom: -0.25rem !important;
  }
  .ml-sm-n1,
  .mx-sm-n1 {
    margin-left: -0.25rem !important;
  }
  .m-sm-n2 {
    margin: -0.5rem !important;
  }
  .mt-sm-n2,
  .my-sm-n2 {
    margin-top: -0.5rem !important;
  }
  .mr-sm-n2,
  .mx-sm-n2 {
    margin-right: -0.5rem !important;
  }
  .mb-sm-n2,
  .my-sm-n2 {
    margin-bottom: -0.5rem !important;
  }
  .ml-sm-n2,
  .mx-sm-n2 {
    margin-left: -0.5rem !important;
  }
  .m-sm-n3 {
    margin: -1rem !important;
  }
  .mt-sm-n3,
  .my-sm-n3 {
    margin-top: -1rem !important;
  }
  .mr-sm-n3,
  .mx-sm-n3 {
    margin-right: -1rem !important;
  }
  .mb-sm-n3,
  .my-sm-n3 {
    margin-bottom: -1rem !important;
  }
  .ml-sm-n3,
  .mx-sm-n3 {
    margin-left: -1rem !important;
  }
  .m-sm-n4 {
    margin: -1.5rem !important;
  }
  .mt-sm-n4,
  .my-sm-n4 {
    margin-top: -1.5rem !important;
  }
  .mr-sm-n4,
  .mx-sm-n4 {
    margin-right: -1.5rem !important;
  }
  .mb-sm-n4,
  .my-sm-n4 {
    margin-bottom: -1.5rem !important;
  }
  .ml-sm-n4,
  .mx-sm-n4 {
    margin-left: -1.5rem !important;
  }
  .m-sm-n5 {
    margin: -3rem !important;
  }
  .mt-sm-n5,
  .my-sm-n5 {
    margin-top: -3rem !important;
  }
  .mr-sm-n5,
  .mx-sm-n5 {
    margin-right: -3rem !important;
  }
  .mb-sm-n5,
  .my-sm-n5 {
    margin-bottom: -3rem !important;
  }
  .ml-sm-n5,
  .mx-sm-n5 {
    margin-left: -3rem !important;
  }
  .m-sm-auto {
    margin: auto !important;
  }
  .mt-sm-auto,
  .my-sm-auto {
    margin-top: auto !important;
  }
  .mr-sm-auto,
  .mx-sm-auto {
    margin-right: auto !important;
  }
  .mb-sm-auto,
  .my-sm-auto {
    margin-bottom: auto !important;
  }
  .ml-sm-auto,
  .mx-sm-auto {
    margin-left: auto !important;
  }
}

@media (min-width: 768px) {
  .m-md-0 {
    margin: 0 !important;
  }
  .mt-md-0,
  .my-md-0 {
    margin-top: 0 !important;
  }
  .mr-md-0,
  .mx-md-0 {
    margin-right: 0 !important;
  }
  .mb-md-0,
  .my-md-0 {
    margin-bottom: 0 !important;
  }
  .ml-md-0,
  .mx-md-0 {
    margin-left: 0 !important;
  }
  .m-md-1 {
    margin: 0.25rem !important;
  }
  .mt-md-1,
  .my-md-1 {
    margin-top: 0.25rem !important;
  }
  .mr-md-1,
  .mx-md-1 {
    margin-right: 0.25rem !important;
  }
  .mb-md-1,
  .my-md-1 {
    margin-bottom: 0.25rem !important;
  }
  .ml-md-1,
  .mx-md-1 {
    margin-left: 0.25rem !important;
  }
  .m-md-2 {
    margin: 0.5rem !important;
  }
  .mt-md-2,
  .my-md-2 {
    margin-top: 0.5rem !important;
  }
  .mr-md-2,
  .mx-md-2 {
    margin-right: 0.5rem !important;
  }
  .mb-md-2,
  .my-md-2 {
    margin-bottom: 0.5rem !important;
  }
  .ml-md-2,
  .mx-md-2 {
    margin-left: 0.5rem !important;
  }
  .m-md-3 {
    margin: 1rem !important;
  }
  .mt-md-3,
  .my-md-3 {
    margin-top: 1rem !important;
  }
  .mr-md-3,
  .mx-md-3 {
    margin-right: 1rem !important;
  }
  .mb-md-3,
  .my-md-3 {
    margin-bottom: 1rem !important;
  }
  .ml-md-3,
  .mx-md-3 {
    margin-left: 1rem !important;
  }
  .m-md-4 {
    margin: 1.5rem !important;
  }
  .mt-md-4,
  .my-md-4 {
    margin-top: 1.5rem !important;
  }
  .mr-md-4,
  .mx-md-4 {
    margin-right: 1.5rem !important;
  }
  .mb-md-4,
  .my-md-4 {
    margin-bottom: 1.5rem !important;
  }
  .ml-md-4,
  .mx-md-4 {
    margin-left: 1.5rem !important;
  }
  .m-md-5 {
    margin: 3rem !important;
  }
  .mt-md-5,
  .my-md-5 {
    margin-top: 3rem !important;
  }
  .mr-md-5,
  .mx-md-5 {
    margin-right: 3rem !important;
  }
  .mb-md-5,
  .my-md-5 {
    margin-bottom: 3rem !important;
  }
  .ml-md-5,
  .mx-md-5 {
    margin-left: 3rem !important;
  }
  .p-md-0 {
    padding: 0 !important;
  }
  .pt-md-0,
  .py-md-0 {
    padding-top: 0 !important;
  }
  .pr-md-0,
  .px-md-0 {
    padding-right: 0 !important;
  }
  .pb-md-0,
  .py-md-0 {
    padding-bottom: 0 !important;
  }
  .pl-md-0,
  .px-md-0 {
    padding-left: 0 !important;
  }
  .p-md-1 {
    padding: 0.25rem !important;
  }
  .pt-md-1,
  .py-md-1 {
    padding-top: 0.25rem !important;
  }
  .pr-md-1,
  .px-md-1 {
    padding-right: 0.25rem !important;
  }
  .pb-md-1,
  .py-md-1 {
    padding-bottom: 0.25rem !important;
  }
  .pl-md-1,
  .px-md-1 {
    padding-left: 0.25rem !important;
  }
  .p-md-2 {
    padding: 0.5rem !important;
  }
  .pt-md-2,
  .py-md-2 {
    padding-top: 0.5rem !important;
  }
  .pr-md-2,
  .px-md-2 {
    padding-right: 0.5rem !important;
  }
  .pb-md-2,
  .py-md-2 {
    padding-bottom: 0.5rem !important;
  }
  .pl-md-2,
  .px-md-2 {
    padding-left: 0.5rem !important;
  }
  .p-md-3 {
    padding: 1rem !important;
  }
  .pt-md-3,
  .py-md-3 {
    padding-top: 1rem !important;
  }
  .pr-md-3,
  .px-md-3 {
    padding-right: 1rem !important;
  }
  .pb-md-3,
  .py-md-3 {
    padding-bottom: 1rem !important;
  }
  .pl-md-3,
  .px-md-3 {
    padding-left: 1rem !important;
  }
  .p-md-4 {
    padding: 1.5rem !important;
  }
  .pt-md-4,
  .py-md-4 {
    padding-top: 1.5rem !important;
  }
  .pr-md-4,
  .px-md-4 {
    padding-right: 1.5rem !important;
  }
  .pb-md-4,
  .py-md-4 {
    padding-bottom: 1.5rem !important;
  }
  .pl-md-4,
  .px-md-4 {
    padding-left: 1.5rem !important;
  }
  .p-md-5 {
    padding: 3rem !important;
  }
  .pt-md-5,
  .py-md-5 {
    padding-top: 3rem !important;
  }
  .pr-md-5,
  .px-md-5 {
    padding-right: 3rem !important;
  }
  .pb-md-5,
  .py-md-5 {
    padding-bottom: 3rem !important;
  }
  .pl-md-5,
  .px-md-5 {
    padding-left: 3rem !important;
  }
  .m-md-n1 {
    margin: -0.25rem !important;
  }
  .mt-md-n1,
  .my-md-n1 {
    margin-top: -0.25rem !important;
  }
  .mr-md-n1,
  .mx-md-n1 {
    margin-right: -0.25rem !important;
  }
  .mb-md-n1,
  .my-md-n1 {
    margin-bottom: -0.25rem !important;
  }
  .ml-md-n1,
  .mx-md-n1 {
    margin-left: -0.25rem !important;
  }
  .m-md-n2 {
    margin: -0.5rem !important;
  }
  .mt-md-n2,
  .my-md-n2 {
    margin-top: -0.5rem !important;
  }
  .mr-md-n2,
  .mx-md-n2 {
    margin-right: -0.5rem !important;
  }
  .mb-md-n2,
  .my-md-n2 {
    margin-bottom: -0.5rem !important;
  }
  .ml-md-n2,
  .mx-md-n2 {
    margin-left: -0.5rem !important;
  }
  .m-md-n3 {
    margin: -1rem !important;
  }
  .mt-md-n3,
  .my-md-n3 {
    margin-top: -1rem !important;
  }
  .mr-md-n3,
  .mx-md-n3 {
    margin-right: -1rem !important;
  }
  .mb-md-n3,
  .my-md-n3 {
    margin-bottom: -1rem !important;
  }
  .ml-md-n3,
  .mx-md-n3 {
    margin-left: -1rem !important;
  }
  .m-md-n4 {
    margin: -1.5rem !important;
  }
  .mt-md-n4,
  .my-md-n4 {
    margin-top: -1.5rem !important;
  }
  .mr-md-n4,
  .mx-md-n4 {
    margin-right: -1.5rem !important;
  }
  .mb-md-n4,
  .my-md-n4 {
    margin-bottom: -1.5rem !important;
  }
  .ml-md-n4,
  .mx-md-n4 {
    margin-left: -1.5rem !important;
  }
  .m-md-n5 {
    margin: -3rem !important;
  }
  .mt-md-n5,
  .my-md-n5 {
    margin-top: -3rem !important;
  }
  .mr-md-n5,
  .mx-md-n5 {
    margin-right: -3rem !important;
  }
  .mb-md-n5,
  .my-md-n5 {
    margin-bottom: -3rem !important;
  }
  .ml-md-n5,
  .mx-md-n5 {
    margin-left: -3rem !important;
  }
  .m-md-auto {
    margin: auto !important;
  }
  .mt-md-auto,
  .my-md-auto {
    margin-top: auto !important;
  }
  .mr-md-auto,
  .mx-md-auto {
    margin-right: auto !important;
  }
  .mb-md-auto,
  .my-md-auto {
    margin-bottom: auto !important;
  }
  .ml-md-auto,
  .mx-md-auto {
    margin-left: auto !important;
  }
}

@media (min-width: 992px) {
  .m-lg-0 {
    margin: 0 !important;
  }
  .mt-lg-0,
  .my-lg-0 {
    margin-top: 0 !important;
  }
  .mr-lg-0,
  .mx-lg-0 {
    margin-right: 0 !important;
  }
  .mb-lg-0,
  .my-lg-0 {
    margin-bottom: 0 !important;
  }
  .ml-lg-0,
  .mx-lg-0 {
    margin-left: 0 !important;
  }
  .m-lg-1 {
    margin: 0.25rem !important;
  }
  .mt-lg-1,
  .my-lg-1 {
    margin-top: 0.25rem !important;
  }
  .mr-lg-1,
  .mx-lg-1 {
    margin-right: 0.25rem !important;
  }
  .mb-lg-1,
  .my-lg-1 {
    margin-bottom: 0.25rem !important;
  }
  .ml-lg-1,
  .mx-lg-1 {
    margin-left: 0.25rem !important;
  }
  .m-lg-2 {
    margin: 0.5rem !important;
  }
  .mt-lg-2,
  .my-lg-2 {
    margin-top: 0.5rem !important;
  }
  .mr-lg-2,
  .mx-lg-2 {
    margin-right: 0.5rem !important;
  }
  .mb-lg-2,
  .my-lg-2 {
    margin-bottom: 0.5rem !important;
  }
  .ml-lg-2,
  .mx-lg-2 {
    margin-left: 0.5rem !important;
  }
  .m-lg-3 {
    margin: 1rem !important;
  }
  .mt-lg-3,
  .my-lg-3 {
    margin-top: 1rem !important;
  }
  .mr-lg-3,
  .mx-lg-3 {
    margin-right: 1rem !important;
  }
  .mb-lg-3,
  .my-lg-3 {
    margin-bottom: 1rem !important;
  }
  .ml-lg-3,
  .mx-lg-3 {
    margin-left: 1rem !important;
  }
  .m-lg-4 {
    margin: 1.5rem !important;
  }
  .mt-lg-4,
  .my-lg-4 {
    margin-top: 1.5rem !important;
  }
  .mr-lg-4,
  .mx-lg-4 {
    margin-right: 1.5rem !important;
  }
  .mb-lg-4,
  .my-lg-4 {
    margin-bottom: 1.5rem !important;
  }
  .ml-lg-4,
  .mx-lg-4 {
    margin-left: 1.5rem !important;
  }
  .m-lg-5 {
    margin: 3rem !important;
  }
  .mt-lg-5,
  .my-lg-5 {
    margin-top: 3rem !important;
  }
  .mr-lg-5,
  .mx-lg-5 {
    margin-right: 3rem !important;
  }
  .mb-lg-5,
  .my-lg-5 {
    margin-bottom: 3rem !important;
  }
  .ml-lg-5,
  .mx-lg-5 {
    margin-left: 3rem !important;
  }
  .p-lg-0 {
    padding: 0 !important;
  }
  .pt-lg-0,
  .py-lg-0 {
    padding-top: 0 !important;
  }
  .pr-lg-0,
  .px-lg-0 {
    padding-right: 0 !important;
  }
  .pb-lg-0,
  .py-lg-0 {
    padding-bottom: 0 !important;
  }
  .pl-lg-0,
  .px-lg-0 {
    padding-left: 0 !important;
  }
  .p-lg-1 {
    padding: 0.25rem !important;
  }
  .pt-lg-1,
  .py-lg-1 {
    padding-top: 0.25rem !important;
  }
  .pr-lg-1,
  .px-lg-1 {
    padding-right: 0.25rem !important;
  }
  .pb-lg-1,
  .py-lg-1 {
    padding-bottom: 0.25rem !important;
  }
  .pl-lg-1,
  .px-lg-1 {
    padding-left: 0.25rem !important;
  }
  .p-lg-2 {
    padding: 0.5rem !important;
  }
  .pt-lg-2,
  .py-lg-2 {
    padding-top: 0.5rem !important;
  }
  .pr-lg-2,
  .px-lg-2 {
    padding-right: 0.5rem !important;
  }
  .pb-lg-2,
  .py-lg-2 {
    padding-bottom: 0.5rem !important;
  }
  .pl-lg-2,
  .px-lg-2 {
    padding-left: 0.5rem !important;
  }
  .p-lg-3 {
    padding: 1rem !important;
  }
  .pt-lg-3,
  .py-lg-3 {
    padding-top: 1rem !important;
  }
  .pr-lg-3,
  .px-lg-3 {
    padding-right: 1rem !important;
  }
  .pb-lg-3,
  .py-lg-3 {
    padding-bottom: 1rem !important;
  }
  .pl-lg-3,
  .px-lg-3 {
    padding-left: 1rem !important;
  }
  .p-lg-4 {
    padding: 1.5rem !important;
  }
  .pt-lg-4,
  .py-lg-4 {
    padding-top: 1.5rem !important;
  }
  .pr-lg-4,
  .px-lg-4 {
    padding-right: 1.5rem !important;
  }
  .pb-lg-4,
  .py-lg-4 {
    padding-bottom: 1.5rem !important;
  }
  .pl-lg-4,
  .px-lg-4 {
    padding-left: 1.5rem !important;
  }
  .p-lg-5 {
    padding: 3rem !important;
  }
  .pt-lg-5,
  .py-lg-5 {
    padding-top: 3rem !important;
  }
  .pr-lg-5,
  .px-lg-5 {
    padding-right: 3rem !important;
  }
  .pb-lg-5,
  .py-lg-5 {
    padding-bottom: 3rem !important;
  }
  .pl-lg-5,
  .px-lg-5 {
    padding-left: 3rem !important;
  }
  .m-lg-n1 {
    margin: -0.25rem !important;
  }
  .mt-lg-n1,
  .my-lg-n1 {
    margin-top: -0.25rem !important;
  }
  .mr-lg-n1,
  .mx-lg-n1 {
    margin-right: -0.25rem !important;
  }
  .mb-lg-n1,
  .my-lg-n1 {
    margin-bottom: -0.25rem !important;
  }
  .ml-lg-n1,
  .mx-lg-n1 {
    margin-left: -0.25rem !important;
  }
  .m-lg-n2 {
    margin: -0.5rem !important;
  }
  .mt-lg-n2,
  .my-lg-n2 {
    margin-top: -0.5rem !important;
  }
  .mr-lg-n2,
  .mx-lg-n2 {
    margin-right: -0.5rem !important;
  }
  .mb-lg-n2,
  .my-lg-n2 {
    margin-bottom: -0.5rem !important;
  }
  .ml-lg-n2,
  .mx-lg-n2 {
    margin-left: -0.5rem !important;
  }
  .m-lg-n3 {
    margin: -1rem !important;
  }
  .mt-lg-n3,
  .my-lg-n3 {
    margin-top: -1rem !important;
  }
  .mr-lg-n3,
  .mx-lg-n3 {
    margin-right: -1rem !important;
  }
  .mb-lg-n3,
  .my-lg-n3 {
    margin-bottom: -1rem !important;
  }
  .ml-lg-n3,
  .mx-lg-n3 {
    margin-left: -1rem !important;
  }
  .m-lg-n4 {
    margin: -1.5rem !important;
  }
  .mt-lg-n4,
  .my-lg-n4 {
    margin-top: -1.5rem !important;
  }
  .mr-lg-n4,
  .mx-lg-n4 {
    margin-right: -1.5rem !important;
  }
  .mb-lg-n4,
  .my-lg-n4 {
    margin-bottom: -1.5rem !important;
  }
  .ml-lg-n4,
  .mx-lg-n4 {
    margin-left: -1.5rem !important;
  }
  .m-lg-n5 {
    margin: -3rem !important;
  }
  .mt-lg-n5,
  .my-lg-n5 {
    margin-top: -3rem !important;
  }
  .mr-lg-n5,
  .mx-lg-n5 {
    margin-right: -3rem !important;
  }
  .mb-lg-n5,
  .my-lg-n5 {
    margin-bottom: -3rem !important;
  }
  .ml-lg-n5,
  .mx-lg-n5 {
    margin-left: -3rem !important;
  }
  .m-lg-auto {
    margin: auto !important;
  }
  .mt-lg-auto,
  .my-lg-auto {
    margin-top: auto !important;
  }
  .mr-lg-auto,
  .mx-lg-auto {
    margin-right: auto !important;
  }
  .mb-lg-auto,
  .my-lg-auto {
    margin-bottom: auto !important;
  }
  .ml-lg-auto,
  .mx-lg-auto {
    margin-left: auto !important;
  }
}

@media (min-width: 1200px) {
  .m-xl-0 {
    margin: 0 !important;
  }
  .mt-xl-0,
  .my-xl-0 {
    margin-top: 0 !important;
  }
  .mr-xl-0,
  .mx-xl-0 {
    margin-right: 0 !important;
  }
  .mb-xl-0,
  .my-xl-0 {
    margin-bottom: 0 !important;
  }
  .ml-xl-0,
  .mx-xl-0 {
    margin-left: 0 !important;
  }
  .m-xl-1 {
    margin: 0.25rem !important;
  }
  .mt-xl-1,
  .my-xl-1 {
    margin-top: 0.25rem !important;
  }
  .mr-xl-1,
  .mx-xl-1 {
    margin-right: 0.25rem !important;
  }
  .mb-xl-1,
  .my-xl-1 {
    margin-bottom: 0.25rem !important;
  }
  .ml-xl-1,
  .mx-xl-1 {
    margin-left: 0.25rem !important;
  }
  .m-xl-2 {
    margin: 0.5rem !important;
  }
  .mt-xl-2,
  .my-xl-2 {
    margin-top: 0.5rem !important;
  }
  .mr-xl-2,
  .mx-xl-2 {
    margin-right: 0.5rem !important;
  }
  .mb-xl-2,
  .my-xl-2 {
    margin-bottom: 0.5rem !important;
  }
  .ml-xl-2,
  .mx-xl-2 {
    margin-left: 0.5rem !important;
  }
  .m-xl-3 {
    margin: 1rem !important;
  }
  .mt-xl-3,
  .my-xl-3 {
    margin-top: 1rem !important;
  }
  .mr-xl-3,
  .mx-xl-3 {
    margin-right: 1rem !important;
  }
  .mb-xl-3,
  .my-xl-3 {
    margin-bottom: 1rem !important;
  }
  .ml-xl-3,
  .mx-xl-3 {
    margin-left: 1rem !important;
  }
  .m-xl-4 {
    margin: 1.5rem !important;
  }
  .mt-xl-4,
  .my-xl-4 {
    margin-top: 1.5rem !important;
  }
  .mr-xl-4,
  .mx-xl-4 {
    margin-right: 1.5rem !important;
  }
  .mb-xl-4,
  .my-xl-4 {
    margin-bottom: 1.5rem !important;
  }
  .ml-xl-4,
  .mx-xl-4 {
    margin-left: 1.5rem !important;
  }
  .m-xl-5 {
    margin: 3rem !important;
  }
  .mt-xl-5,
  .my-xl-5 {
    margin-top: 3rem !important;
  }
  .mr-xl-5,
  .mx-xl-5 {
    margin-right: 3rem !important;
  }
  .mb-xl-5,
  .my-xl-5 {
    margin-bottom: 3rem !important;
  }
  .ml-xl-5,
  .mx-xl-5 {
    margin-left: 3rem !important;
  }
  .p-xl-0 {
    padding: 0 !important;
  }
  .pt-xl-0,
  .py-xl-0 {
    padding-top: 0 !important;
  }
  .pr-xl-0,
  .px-xl-0 {
    padding-right: 0 !important;
  }
  .pb-xl-0,
  .py-xl-0 {
    padding-bottom: 0 !important;
  }
  .pl-xl-0,
  .px-xl-0 {
    padding-left: 0 !important;
  }
  .p-xl-1 {
    padding: 0.25rem !important;
  }
  .pt-xl-1,
  .py-xl-1 {
    padding-top: 0.25rem !important;
  }
  .pr-xl-1,
  .px-xl-1 {
    padding-right: 0.25rem !important;
  }
  .pb-xl-1,
  .py-xl-1 {
    padding-bottom: 0.25rem !important;
  }
  .pl-xl-1,
  .px-xl-1 {
    padding-left: 0.25rem !important;
  }
  .p-xl-2 {
    padding: 0.5rem !important;
  }
  .pt-xl-2,
  .py-xl-2 {
    padding-top: 0.5rem !important;
  }
  .pr-xl-2,
  .px-xl-2 {
    padding-right: 0.5rem !important;
  }
  .pb-xl-2,
  .py-xl-2 {
    padding-bottom: 0.5rem !important;
  }
  .pl-xl-2,
  .px-xl-2 {
    padding-left: 0.5rem !important;
  }
  .p-xl-3 {
    padding: 1rem !important;
  }
  .pt-xl-3,
  .py-xl-3 {
    padding-top: 1rem !important;
  }
  .pr-xl-3,
  .px-xl-3 {
    padding-right: 1rem !important;
  }
  .pb-xl-3,
  .py-xl-3 {
    padding-bottom: 1rem !important;
  }
  .pl-xl-3,
  .px-xl-3 {
    padding-left: 1rem !important;
  }
  .p-xl-4 {
    padding: 1.5rem !important;
  }
  .pt-xl-4,
  .py-xl-4 {
    padding-top: 1.5rem !important;
  }
  .pr-xl-4,
  .px-xl-4 {
    padding-right: 1.5rem !important;
  }
  .pb-xl-4,
  .py-xl-4 {
    padding-bottom: 1.5rem !important;
  }
  .pl-xl-4,
  .px-xl-4 {
    padding-left: 1.5rem !important;
  }
  .p-xl-5 {
    padding: 3rem !important;
  }
  .pt-xl-5,
  .py-xl-5 {
    padding-top: 3rem !important;
  }
  .pr-xl-5,
  .px-xl-5 {
    padding-right: 3rem !important;
  }
  .pb-xl-5,
  .py-xl-5 {
    padding-bottom: 3rem !important;
  }
  .pl-xl-5,
  .px-xl-5 {
    padding-left: 3rem !important;
  }
  .m-xl-n1 {
    margin: -0.25rem !important;
  }
  .mt-xl-n1,
  .my-xl-n1 {
    margin-top: -0.25rem !important;
  }
  .mr-xl-n1,
  .mx-xl-n1 {
    margin-right: -0.25rem !important;
  }
  .mb-xl-n1,
  .my-xl-n1 {
    margin-bottom: -0.25rem !important;
  }
  .ml-xl-n1,
  .mx-xl-n1 {
    margin-left: -0.25rem !important;
  }
  .m-xl-n2 {
    margin: -0.5rem !important;
  }
  .mt-xl-n2,
  .my-xl-n2 {
    margin-top: -0.5rem !important;
  }
  .mr-xl-n2,
  .mx-xl-n2 {
    margin-right: -0.5rem !important;
  }
  .mb-xl-n2,
  .my-xl-n2 {
    margin-bottom: -0.5rem !important;
  }
  .ml-xl-n2,
  .mx-xl-n2 {
    margin-left: -0.5rem !important;
  }
  .m-xl-n3 {
    margin: -1rem !important;
  }
  .mt-xl-n3,
  .my-xl-n3 {
    margin-top: -1rem !important;
  }
  .mr-xl-n3,
  .mx-xl-n3 {
    margin-right: -1rem !important;
  }
  .mb-xl-n3,
  .my-xl-n3 {
    margin-bottom: -1rem !important;
  }
  .ml-xl-n3,
  .mx-xl-n3 {
    margin-left: -1rem !important;
  }
  .m-xl-n4 {
    margin: -1.5rem !important;
  }
  .mt-xl-n4,
  .my-xl-n4 {
    margin-top: -1.5rem !important;
  }
  .mr-xl-n4,
  .mx-xl-n4 {
    margin-right: -1.5rem !important;
  }
  .mb-xl-n4,
  .my-xl-n4 {
    margin-bottom: -1.5rem !important;
  }
  .ml-xl-n4,
  .mx-xl-n4 {
    margin-left: -1.5rem !important;
  }
  .m-xl-n5 {
    margin: -3rem !important;
  }
  .mt-xl-n5,
  .my-xl-n5 {
    margin-top: -3rem !important;
  }
  .mr-xl-n5,
  .mx-xl-n5 {
    margin-right: -3rem !important;
  }
  .mb-xl-n5,
  .my-xl-n5 {
    margin-bottom: -3rem !important;
  }
  .ml-xl-n5,
  .mx-xl-n5 {
    margin-left: -3rem !important;
  }
  .m-xl-auto {
    margin: auto !important;
  }
  .mt-xl-auto,
  .my-xl-auto {
    margin-top: auto !important;
  }
  .mr-xl-auto,
  .mx-xl-auto {
    margin-right: auto !important;
  }
  .mb-xl-auto,
  .my-xl-auto {
    margin-bottom: auto !important;
  }
  .ml-xl-auto,
  .mx-xl-auto {
    margin-left: auto !important;
  }
}

.text-monospace {
  font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace !important;
}

.text-justify {
  text-align: justify !important;
}

.text-wrap {
  white-space: normal !important;
}

.text-nowrap {
  white-space: nowrap !important;
}

.text-truncate {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

.text-left {
  text-align: left !important;
}

.text-right {
  text-align: right !important;
}

.text-center {
  text-align: center !important;
}

@media (min-width: 576px) {
  .text-sm-left {
    text-align: left !important;
  }
  .text-sm-right {
    text-align: right !important;
  }
  .text-sm-center {
    text-align: center !important;
  }
}

@media (min-width: 768px) {
  .text-md-left {
    text-align: left !important;
  }
  .text-md-right {
    text-align: right !important;
  }
  .text-md-center {
    text-align: center !important;
  }
}

@media (min-width: 992px) {
  .text-lg-left {
    text-align: left !important;
  }
  .text-lg-right {
    text-align: right !important;
  }
  .text-lg-center {
    text-align: center !important;
  }
}

@media (min-width: 1200px) {
  .text-xl-left {
    text-align: left !important;
  }
  .text-xl-right {
    text-align: right !important;
  }
  .text-xl-center {
    text-align: center !important;
  }
}

.text-lowercase {
  text-transform: lowercase !important;
}

.text-uppercase {
  text-transform: uppercase !important;
}

.text-capitalize {
  text-transform: capitalize !important;
}

.font-weight-light {
  font-weight: 300 !important;
}

.font-weight-lighter {
  font-weight: lighter !important;
}

.font-weight-normal {
  font-weight: 400 !important;
}

.font-weight-bold {
  font-weight: 700 !important;
}

.font-weight-bolder {
  font-weight: bolder !important;
}

.font-italic {
  font-style: italic !important;
}

.text-white {
  color: #fff !important;
}

.text-primary {
  color: #20a8d8 !important;
}

a.text-primary:hover, a.text-primary:focus {
  color: #167495 !important;
}

.text-secondary {
  color: #c8ced3 !important;
}

a.text-secondary:hover, a.text-secondary:focus {
  color: #9ea8b1 !important;
}

.text-success {
  color: #4dbd74 !important;
}

a.text-success:hover, a.text-success:focus {
  color: #338a52 !important;
}

.text-info {
  color: #63c2de !important;
}

a.text-info:hover, a.text-info:focus {
  color: #2ba6ca !important;
}

.text-warning {
  color: #ffc107 !important;
}

a.text-warning:hover, a.text-warning:focus {
  color: #ba8b00 !important;
}

.text-danger {
  color: #f86c6b !important;
}

a.text-danger:hover, a.text-danger:focus {
  color: #f52322 !important;
}

.text-light {
  color: #f0f3f5 !important;
}

a.text-light:hover, a.text-light:focus {
  color: #c2ced6 !important;
}

.text-dark {
  color: #2f353a !important;
}

a.text-dark:hover, a.text-dark:focus {
  color: #0d0e10 !important;
}

.text-body {
  color: #23282c !important;
}

.text-muted {
  color: #73818f !important;
}

.text-black-50 {
  color: rgba(0, 0, 0, 0.5) !important;
}

.text-white-50 {
  color: rgba(255, 255, 255, 0.5) !important;
}

.text-hide {
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

.text-decoration-none {
  text-decoration: none !important;
}

.text-break {
  word-break: break-word !important;
  overflow-wrap: break-word !important;
}

.text-reset {
  color: inherit !important;
}

.visible {
  visibility: visible !important;
}

.invisible {
  visibility: hidden !important;
}

@media print {
  *,
  *::before,
  *::after {
    text-shadow: none !important;
    box-shadow: none !important;
  }
  a:not(.btn) {
    text-decoration: underline;
  }
  abbr[title]::after {
    content: " (" attr(title) ")";
  }
  pre {
    white-space: pre-wrap !important;
  }
  pre,
  blockquote {
    border: 1px solid #8f9ba6;
    page-break-inside: avoid;
  }
  thead {
    display: table-header-group;
  }
  tr,
  img {
    page-break-inside: avoid;
  }
  p,
  h2,
  h3 {
    orphans: 3;
    widows: 3;
  }
  h2,
  h3 {
    page-break-after: avoid;
  }
  @page {
    size: a3;
  }
  body {
    min-width: 992px !important;
  }
  .container {
    min-width: 992px !important;
  }
  .navbar {
    display: none;
  }
  .badge {
    border: 1px solid #000;
  }
  .table {
    border-collapse: collapse !important;
  }
  .table td,
  .table th {
    background-color: #fff !important;
  }
  .table-bordered th,
  .table-bordered td {
    border: 1px solid #c8ced3 !important;
  }
  .table-dark {
    color: inherit;
  }
  .table-dark th,
  .table-dark td,
  .table-dark thead th,
  .table-dark tbody + tbody {
    border-color: #c8ced3;
  }
  .table .thead-dark th {
    color: inherit;
    border-color: #c8ced3;
  }
}

.animated {
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
}

.animated.infinite {
  -webkit-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
}

.animated.hinge {
  -webkit-animation-duration: 2s;
  animation-duration: 2s;
}

@-webkit-keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

.fadeIn {
  -webkit-animation-name: fadeIn;
  animation-name: fadeIn;
}

.ps {
  overflow: hidden !important;
  -ms-touch-action: auto;
  touch-action: auto;
  -ms-overflow-style: none;
  overflow-anchor: none;
}

.ps__rail-x {
  position: absolute;
  bottom: 0;
  display: none;
  height: 15px;
  opacity: 0;
  transition: background-color .2s linear, opacity .2s linear;
}

.ps__rail-y {
  position: absolute;
  right: 0;
  display: none;
  width: 15px;
  opacity: 0;
  transition: background-color .2s linear, opacity .2s linear;
}

.ps--active-x > .ps__rail-x,
.ps--active-y > .ps__rail-y {
  display: block;
  background-color: transparent;
}

.ps:hover > .ps__rail-x,
.ps:hover > .ps__rail-y,
.ps--focus > .ps__rail-x,
.ps--focus > .ps__rail-y,
.ps--scrolling-x > .ps__rail-x,
.ps--scrolling-y > .ps__rail-y {
  opacity: .6;
}

.ps__rail-x:hover,
.ps__rail-y:hover,
.ps__rail-x:focus,
.ps__rail-y:focus {
  background-color: #eee;
  opacity: .9;
}

/*
 * Scrollbar thumb styles
 */
.ps__thumb-x {
  position: absolute;
  bottom: 2px;
  height: 6px;
  background-color: #aaa;
  border-radius: 6px;
  transition: background-color .2s linear, height .2s ease-in-out;
}

.ps__thumb-y {
  position: absolute;
  right: 2px;
  width: 6px;
  background-color: #aaa;
  border-radius: 6px;
  transition: background-color .2s linear, width .2s ease-in-out;
}

.ps__rail-x:hover > .ps__thumb-x,
.ps__rail-x:focus > .ps__thumb-x {
  height: 11px;
  background-color: #999;
}

.ps__rail-y:hover > .ps__thumb-y,
.ps__rail-y:focus > .ps__thumb-y {
  width: 11px;
  background-color: #999;
}

@supports (-ms-overflow-style: none) {
  .ps {
    overflow: auto !important;
  }
}

@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {
  .ps {
    overflow: auto !important;
  }
}

.aside-menu {
  z-index: 1019;
  width: 250px;
  color: #2f353a;
  background: #fff;
  border-left: 1px solid #c8ced3;
}

.aside-menu .nav-tabs {
  border-color: #c8ced3;
}

.aside-menu .nav-tabs .nav-link {
  padding: 0.75rem 1rem;
  color: #23282c;
  border-top: 0;
  border-radius: 0;
}

.aside-menu .nav-tabs .nav-link.active {
  color: #20a8d8;
  border-right-color: #c8ced3;
  border-left-color: #c8ced3;
  background-color: #f0f3f5 !important;
}

.aside-menu .nav-tabs .nav-item:first-child .nav-link {
  border-left: 0;
}

.aside-menu .tab-content {
  position: relative;
  overflow-x: hidden;
  overflow-y: auto;
  border: 0;
  border-top: 1px solid #c8ced3;
  -ms-overflow-style: -ms-autohiding-scrollbar;
}

.aside-menu .tab-content::-webkit-scrollbar {
  width: 10px;
  margin-left: -10px;
  -webkit-appearance: none;
  appearance: none;
}

.aside-menu .tab-content::-webkit-scrollbar-track {
  background-color: white;
  border-right: 1px solid #f2f2f2;
  border-left: 1px solid #f2f2f2;
}

.aside-menu .tab-content::-webkit-scrollbar-thumb {
  height: 50px;
  background-color: #e6e6e6;
  background-clip: content-box;
  border-color: transparent;
  border-style: solid;
  border-width: 1px 2px;
}

.aside-menu .tab-content .tab-pane {
  padding: 0;
}

.avatar {
  position: relative;
  display: inline-block;
  width: 36px;
  height: 36px;
}

.avatar .avatar-status {
  position: absolute;
  right: 0;
  bottom: 0;
  display: block;
  width: 10px;
  height: 10px;
  border: 1px solid #fff;
  border-radius: 50em;
}

.avatar > img {
  vertical-align: initial;
}

.avatar-lg {
  position: relative;
  display: inline-block;
  width: 72px;
  height: 72px;
}

.avatar-lg .avatar-status {
  position: absolute;
  right: 0;
  bottom: 0;
  display: block;
  width: 12px;
  height: 12px;
  border: 1px solid #fff;
  border-radius: 50em;
}

.avatar-sm {
  position: relative;
  display: inline-block;
  width: 24px;
  height: 24px;
}

.avatar-sm .avatar-status {
  position: absolute;
  right: 0;
  bottom: 0;
  display: block;
  width: 8px;
  height: 8px;
  border: 1px solid #fff;
  border-radius: 50em;
}

.avatar-xs {
  position: relative;
  display: inline-block;
  width: 20px;
  height: 20px;
}

.avatar-xs .avatar-status {
  position: absolute;
  right: 0;
  bottom: 0;
  display: block;
  width: 8px;
  height: 8px;
  border: 1px solid #fff;
  border-radius: 50em;
}

.avatars-stack .avatar {
  margin-right: -18px;
  transition: margin-right 0.25s;
}

.avatars-stack .avatar:hover {
  margin-right: 0;
}

.avatars-stack .avatar-lg {
  margin-right: -36px;
}

.avatars-stack .avatar-sm {
  margin-right: -12px;
}

.avatars-stack .avatar-xs {
  margin-right: -10px;
}

.badge-pill {
  border-radius: 10rem;
}

.breadcrumb-menu {
  margin-left: auto;
}

.breadcrumb-menu::before {
  display: none;
}

.breadcrumb-menu .btn-group {
  vertical-align: top;
}

.breadcrumb-menu .btn {
  padding: 0 0.75rem;
  color: #73818f;
  vertical-align: top;
  border: 0;
}

.breadcrumb-menu .btn:hover, .breadcrumb-menu .btn.active {
  color: #23282c;
  background: transparent;
}

.breadcrumb-menu .open .btn {
  color: #23282c;
  background: transparent;
}

.breadcrumb-menu .dropdown-menu {
  min-width: 180px;
  line-height: 1.5;
}

*[dir="rtl"] .breadcrumb-menu {
  margin-right: auto;
  margin-left: initial;
}

.breadcrumb {
  position: relative;
  border-radius: 0;
  border-bottom: 1px solid #c8ced3;
}

*[dir="rtl"] .breadcrumb-item::before {
  padding-right: 0;
  padding-left: 0.5rem;
}

*[dir="rtl"] .breadcrumb-item {
  padding-right: 0.5rem;
  padding-left: 0;
}

.brand-card {
  position: relative;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
  min-width: 0;
  margin-bottom: 1.5rem;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 1px solid #c8ced3;
  border-radius: 0.25rem;
}

.brand-card-header {
  position: relative;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  -ms-flex-pack: center;
  justify-content: center;
  height: 6rem;
  border-radius: 0.25rem 0.25rem 0 0;
}

.brand-card-header i {
  font-size: 2rem;
  color: #fff;
}

.brand-card-header .chart-wrapper {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.brand-card-body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: row;
  flex-direction: row;
  padding: 0.75rem 0;
  text-align: center;
}

.brand-card-body > * {
  -ms-flex: 1;
  flex: 1;
  padding: 0.1875rem 0;
}

.brand-card-body > *:not(:last-child) {
  border-right: 1px solid #c8ced3;
}

*[dir="rtl"] .brand-card-body > *:not(:last-child) {
  border-right: 0;
  border-left: 1px solid #c8ced3;
}

.btn-brand {
  border: 0;
}

.btn-brand i {
  display: inline-block;
  width: 2.0625rem;
  margin: -0.375rem -0.75rem;
  line-height: 2.0625rem;
  text-align: center;
  background-color: rgba(0, 0, 0, 0.2);
  border-radius: 0.25rem;
}

.btn-brand i + span {
  margin-left: 1.5rem;
}

.btn-brand.btn-lg i, .btn-group-lg > .btn-brand.btn i {
  width: 2.640625rem;
  margin: -0.5rem -1rem;
  line-height: 2.640625rem;
  border-radius: 0.3rem;
}

.btn-brand.btn-lg i + span, .btn-group-lg > .btn-brand.btn i + span {
  margin-left: 2rem;
}

.btn-brand.btn-sm i, .btn-group-sm > .btn-brand.btn i {
  width: 1.648438rem;
  margin: -0.25rem -0.5rem;
  line-height: 1.648438rem;
  border-radius: 0.2rem;
}

.btn-brand.btn-sm i + span, .btn-group-sm > .btn-brand.btn i + span {
  margin-left: 1rem;
}

.btn-brand.btn-square i {
  border-radius: 0;
}

.btn-facebook {
  color: #fff;
  background-color: #3b5998;
  border-color: #3b5998;
}

.btn-facebook:hover {
  color: #fff;
  background-color: #30497c;
  border-color: #2d4373;
}

.btn-facebook:focus, .btn-facebook.focus {
  box-shadow: 0 0 0 0.2rem rgba(88, 114, 167, 0.5);
}

.btn-facebook.disabled, .btn-facebook:disabled {
  color: #fff;
  background-color: #3b5998;
  border-color: #3b5998;
}

.btn-facebook:not(:disabled):not(.disabled):active, .btn-facebook:not(:disabled):not(.disabled).active,
.show > .btn-facebook.dropdown-toggle {
  color: #fff;
  background-color: #2d4373;
  border-color: #293e6a;
}

.btn-facebook:not(:disabled):not(.disabled):active:focus, .btn-facebook:not(:disabled):not(.disabled).active:focus,
.show > .btn-facebook.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(88, 114, 167, 0.5);
}

.btn-twitter {
  color: #fff;
  background-color: #00aced;
  border-color: #00aced;
}

.btn-twitter:hover {
  color: #fff;
  background-color: #0090c7;
  border-color: #0087ba;
}

.btn-twitter:focus, .btn-twitter.focus {
  box-shadow: 0 0 0 0.2rem rgba(38, 184, 240, 0.5);
}

.btn-twitter.disabled, .btn-twitter:disabled {
  color: #fff;
  background-color: #00aced;
  border-color: #00aced;
}

.btn-twitter:not(:disabled):not(.disabled):active, .btn-twitter:not(:disabled):not(.disabled).active,
.show > .btn-twitter.dropdown-toggle {
  color: #fff;
  background-color: #0087ba;
  border-color: #007ead;
}

.btn-twitter:not(:disabled):not(.disabled):active:focus, .btn-twitter:not(:disabled):not(.disabled).active:focus,
.show > .btn-twitter.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(38, 184, 240, 0.5);
}

.btn-linkedin {
  color: #fff;
  background-color: #4875b4;
  border-color: #4875b4;
}

.btn-linkedin:hover {
  color: #fff;
  background-color: #3d6399;
  border-color: #395d90;
}

.btn-linkedin:focus, .btn-linkedin.focus {
  box-shadow: 0 0 0 0.2rem rgba(99, 138, 191, 0.5);
}

.btn-linkedin.disabled, .btn-linkedin:disabled {
  color: #fff;
  background-color: #4875b4;
  border-color: #4875b4;
}

.btn-linkedin:not(:disabled):not(.disabled):active, .btn-linkedin:not(:disabled):not(.disabled).active,
.show > .btn-linkedin.dropdown-toggle {
  color: #fff;
  background-color: #395d90;
  border-color: #365786;
}

.btn-linkedin:not(:disabled):not(.disabled):active:focus, .btn-linkedin:not(:disabled):not(.disabled).active:focus,
.show > .btn-linkedin.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(99, 138, 191, 0.5);
}

.btn-google-plus {
  color: #fff;
  background-color: #d34836;
  border-color: #d34836;
}

.btn-google-plus:hover {
  color: #fff;
  background-color: #ba3929;
  border-color: #b03626;
}

.btn-google-plus:focus, .btn-google-plus.focus {
  box-shadow: 0 0 0 0.2rem rgba(218, 99, 84, 0.5);
}

.btn-google-plus.disabled, .btn-google-plus:disabled {
  color: #fff;
  background-color: #d34836;
  border-color: #d34836;
}

.btn-google-plus:not(:disabled):not(.disabled):active, .btn-google-plus:not(:disabled):not(.disabled).active,
.show > .btn-google-plus.dropdown-toggle {
  color: #fff;
  background-color: #b03626;
  border-color: #a53324;
}

.btn-google-plus:not(:disabled):not(.disabled):active:focus, .btn-google-plus:not(:disabled):not(.disabled).active:focus,
.show > .btn-google-plus.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(218, 99, 84, 0.5);
}

.btn-flickr {
  color: #fff;
  background-color: #ff0084;
  border-color: #ff0084;
}

.btn-flickr:hover {
  color: #fff;
  background-color: #d90070;
  border-color: #cc006a;
}

.btn-flickr:focus, .btn-flickr.focus {
  box-shadow: 0 0 0 0.2rem rgba(255, 38, 150, 0.5);
}

.btn-flickr.disabled, .btn-flickr:disabled {
  color: #fff;
  background-color: #ff0084;
  border-color: #ff0084;
}

.btn-flickr:not(:disabled):not(.disabled):active, .btn-flickr:not(:disabled):not(.disabled).active,
.show > .btn-flickr.dropdown-toggle {
  color: #fff;
  background-color: #cc006a;
  border-color: #bf0063;
}

.btn-flickr:not(:disabled):not(.disabled):active:focus, .btn-flickr:not(:disabled):not(.disabled).active:focus,
.show > .btn-flickr.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(255, 38, 150, 0.5);
}

.btn-tumblr {
  color: #fff;
  background-color: #32506d;
  border-color: #32506d;
}

.btn-tumblr:hover {
  color: #fff;
  background-color: #263d53;
  border-color: #22364a;
}

.btn-tumblr:focus, .btn-tumblr.focus {
  box-shadow: 0 0 0 0.2rem rgba(81, 106, 131, 0.5);
}

.btn-tumblr.disabled, .btn-tumblr:disabled {
  color: #fff;
  background-color: #32506d;
  border-color: #32506d;
}

.btn-tumblr:not(:disabled):not(.disabled):active, .btn-tumblr:not(:disabled):not(.disabled).active,
.show > .btn-tumblr.dropdown-toggle {
  color: #fff;
  background-color: #22364a;
  border-color: #1e3041;
}

.btn-tumblr:not(:disabled):not(.disabled):active:focus, .btn-tumblr:not(:disabled):not(.disabled).active:focus,
.show > .btn-tumblr.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(81, 106, 131, 0.5);
}

.btn-xing {
  color: #fff;
  background-color: #026466;
  border-color: #026466;
}

.btn-xing:hover {
  color: #fff;
  background-color: #013f40;
  border-color: #013334;
}

.btn-xing:focus, .btn-xing.focus {
  box-shadow: 0 0 0 0.2rem rgba(40, 123, 125, 0.5);
}

.btn-xing.disabled, .btn-xing:disabled {
  color: #fff;
  background-color: #026466;
  border-color: #026466;
}

.btn-xing:not(:disabled):not(.disabled):active, .btn-xing:not(:disabled):not(.disabled).active,
.show > .btn-xing.dropdown-toggle {
  color: #fff;
  background-color: #013334;
  border-color: #012727;
}

.btn-xing:not(:disabled):not(.disabled):active:focus, .btn-xing:not(:disabled):not(.disabled).active:focus,
.show > .btn-xing.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(40, 123, 125, 0.5);
}

.btn-github {
  color: #fff;
  background-color: #4183c4;
  border-color: #4183c4;
}

.btn-github:hover {
  color: #fff;
  background-color: #3570aa;
  border-color: #3269a0;
}

.btn-github:focus, .btn-github.focus {
  box-shadow: 0 0 0 0.2rem rgba(94, 150, 205, 0.5);
}

.btn-github.disabled, .btn-github:disabled {
  color: #fff;
  background-color: #4183c4;
  border-color: #4183c4;
}

.btn-github:not(:disabled):not(.disabled):active, .btn-github:not(:disabled):not(.disabled).active,
.show > .btn-github.dropdown-toggle {
  color: #fff;
  background-color: #3269a0;
  border-color: #2f6397;
}

.btn-github:not(:disabled):not(.disabled):active:focus, .btn-github:not(:disabled):not(.disabled).active:focus,
.show > .btn-github.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(94, 150, 205, 0.5);
}

.btn-html5 {
  color: #fff;
  background-color: #e34f26;
  border-color: #e34f26;
}

.btn-html5:hover {
  color: #fff;
  background-color: #c9401a;
  border-color: #be3c18;
}

.btn-html5:focus, .btn-html5.focus {
  box-shadow: 0 0 0 0.2rem rgba(231, 105, 71, 0.5);
}

.btn-html5.disabled, .btn-html5:disabled {
  color: #fff;
  background-color: #e34f26;
  border-color: #e34f26;
}

.btn-html5:not(:disabled):not(.disabled):active, .btn-html5:not(:disabled):not(.disabled).active,
.show > .btn-html5.dropdown-toggle {
  color: #fff;
  background-color: #be3c18;
  border-color: #b23917;
}

.btn-html5:not(:disabled):not(.disabled):active:focus, .btn-html5:not(:disabled):not(.disabled).active:focus,
.show > .btn-html5.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(231, 105, 71, 0.5);
}

.btn-openid {
  color: #23282c;
  background-color: #f78c40;
  border-color: #f78c40;
}

.btn-openid:hover {
  color: #fff;
  background-color: #f5761b;
  border-color: #f56f0f;
}

.btn-openid:focus, .btn-openid.focus {
  box-shadow: 0 0 0 0.2rem rgba(215, 125, 61, 0.5);
}

.btn-openid.disabled, .btn-openid:disabled {
  color: #23282c;
  background-color: #f78c40;
  border-color: #f78c40;
}

.btn-openid:not(:disabled):not(.disabled):active, .btn-openid:not(:disabled):not(.disabled).active,
.show > .btn-openid.dropdown-toggle {
  color: #fff;
  background-color: #f56f0f;
  border-color: #ed680a;
}

.btn-openid:not(:disabled):not(.disabled):active:focus, .btn-openid:not(:disabled):not(.disabled).active:focus,
.show > .btn-openid.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(215, 125, 61, 0.5);
}

.btn-stack-overflow {
  color: #fff;
  background-color: #fe7a15;
  border-color: #fe7a15;
}

.btn-stack-overflow:hover {
  color: #fff;
  background-color: #ec6701;
  border-color: #df6101;
}

.btn-stack-overflow:focus, .btn-stack-overflow.focus {
  box-shadow: 0 0 0 0.2rem rgba(254, 142, 56, 0.5);
}

.btn-stack-overflow.disabled, .btn-stack-overflow:disabled {
  color: #fff;
  background-color: #fe7a15;
  border-color: #fe7a15;
}

.btn-stack-overflow:not(:disabled):not(.disabled):active, .btn-stack-overflow:not(:disabled):not(.disabled).active,
.show > .btn-stack-overflow.dropdown-toggle {
  color: #fff;
  background-color: #df6101;
  border-color: #d25c01;
}

.btn-stack-overflow:not(:disabled):not(.disabled):active:focus, .btn-stack-overflow:not(:disabled):not(.disabled).active:focus,
.show > .btn-stack-overflow.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(254, 142, 56, 0.5);
}

.btn-youtube {
  color: #fff;
  background-color: #b00;
  border-color: #b00;
}

.btn-youtube:hover {
  color: #fff;
  background-color: #950000;
  border-color: #880000;
}

.btn-youtube:focus, .btn-youtube.focus {
  box-shadow: 0 0 0 0.2rem rgba(197, 38, 38, 0.5);
}

.btn-youtube.disabled, .btn-youtube:disabled {
  color: #fff;
  background-color: #b00;
  border-color: #b00;
}

.btn-youtube:not(:disabled):not(.disabled):active, .btn-youtube:not(:disabled):not(.disabled).active,
.show > .btn-youtube.dropdown-toggle {
  color: #fff;
  background-color: #880000;
  border-color: #7b0000;
}

.btn-youtube:not(:disabled):not(.disabled):active:focus, .btn-youtube:not(:disabled):not(.disabled).active:focus,
.show > .btn-youtube.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(197, 38, 38, 0.5);
}

.btn-css3 {
  color: #fff;
  background-color: #0170ba;
  border-color: #0170ba;
}

.btn-css3:hover {
  color: #fff;
  background-color: #015994;
  border-color: #015187;
}

.btn-css3:focus, .btn-css3.focus {
  box-shadow: 0 0 0 0.2rem rgba(39, 133, 196, 0.5);
}

.btn-css3.disabled, .btn-css3:disabled {
  color: #fff;
  background-color: #0170ba;
  border-color: #0170ba;
}

.btn-css3:not(:disabled):not(.disabled):active, .btn-css3:not(:disabled):not(.disabled).active,
.show > .btn-css3.dropdown-toggle {
  color: #fff;
  background-color: #015187;
  border-color: #014a7b;
}

.btn-css3:not(:disabled):not(.disabled):active:focus, .btn-css3:not(:disabled):not(.disabled).active:focus,
.show > .btn-css3.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(39, 133, 196, 0.5);
}

.btn-dribbble {
  color: #fff;
  background-color: #ea4c89;
  border-color: #ea4c89;
}

.btn-dribbble:hover {
  color: #fff;
  background-color: #e62a72;
  border-color: #e51e6b;
}

.btn-dribbble:focus, .btn-dribbble.focus {
  box-shadow: 0 0 0 0.2rem rgba(237, 103, 155, 0.5);
}

.btn-dribbble.disabled, .btn-dribbble:disabled {
  color: #fff;
  background-color: #ea4c89;
  border-color: #ea4c89;
}

.btn-dribbble:not(:disabled):not(.disabled):active, .btn-dribbble:not(:disabled):not(.disabled).active,
.show > .btn-dribbble.dropdown-toggle {
  color: #fff;
  background-color: #e51e6b;
  border-color: #dc1a65;
}

.btn-dribbble:not(:disabled):not(.disabled):active:focus, .btn-dribbble:not(:disabled):not(.disabled).active:focus,
.show > .btn-dribbble.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(237, 103, 155, 0.5);
}

.btn-instagram {
  color: #fff;
  background-color: #517fa4;
  border-color: #517fa4;
}

.btn-instagram:hover {
  color: #fff;
  background-color: #446b8a;
  border-color: #406582;
}

.btn-instagram:focus, .btn-instagram.focus {
  box-shadow: 0 0 0 0.2rem rgba(107, 146, 178, 0.5);
}

.btn-instagram.disabled, .btn-instagram:disabled {
  color: #fff;
  background-color: #517fa4;
  border-color: #517fa4;
}

.btn-instagram:not(:disabled):not(.disabled):active, .btn-instagram:not(:disabled):not(.disabled).active,
.show > .btn-instagram.dropdown-toggle {
  color: #fff;
  background-color: #406582;
  border-color: #3c5e79;
}

.btn-instagram:not(:disabled):not(.disabled):active:focus, .btn-instagram:not(:disabled):not(.disabled).active:focus,
.show > .btn-instagram.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(107, 146, 178, 0.5);
}

.btn-pinterest {
  color: #fff;
  background-color: #cb2027;
  border-color: #cb2027;
}

.btn-pinterest:hover {
  color: #fff;
  background-color: #aa1b21;
  border-color: #9f191f;
}

.btn-pinterest:focus, .btn-pinterest.focus {
  box-shadow: 0 0 0 0.2rem rgba(211, 65, 71, 0.5);
}

.btn-pinterest.disabled, .btn-pinterest:disabled {
  color: #fff;
  background-color: #cb2027;
  border-color: #cb2027;
}

.btn-pinterest:not(:disabled):not(.disabled):active, .btn-pinterest:not(:disabled):not(.disabled).active,
.show > .btn-pinterest.dropdown-toggle {
  color: #fff;
  background-color: #9f191f;
  border-color: #94171c;
}

.btn-pinterest:not(:disabled):not(.disabled):active:focus, .btn-pinterest:not(:disabled):not(.disabled).active:focus,
.show > .btn-pinterest.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(211, 65, 71, 0.5);
}

.btn-vk {
  color: #fff;
  background-color: #45668e;
  border-color: #45668e;
}

.btn-vk:hover {
  color: #fff;
  background-color: #385474;
  border-color: #344d6c;
}

.btn-vk:focus, .btn-vk.focus {
  box-shadow: 0 0 0 0.2rem rgba(97, 125, 159, 0.5);
}

.btn-vk.disabled, .btn-vk:disabled {
  color: #fff;
  background-color: #45668e;
  border-color: #45668e;
}

.btn-vk:not(:disabled):not(.disabled):active, .btn-vk:not(:disabled):not(.disabled).active,
.show > .btn-vk.dropdown-toggle {
  color: #fff;
  background-color: #344d6c;
  border-color: #304763;
}

.btn-vk:not(:disabled):not(.disabled):active:focus, .btn-vk:not(:disabled):not(.disabled).active:focus,
.show > .btn-vk.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(97, 125, 159, 0.5);
}

.btn-yahoo {
  color: #fff;
  background-color: #400191;
  border-color: #400191;
}

.btn-yahoo:hover {
  color: #fff;
  background-color: #2f016b;
  border-color: #2a015e;
}

.btn-yahoo:focus, .btn-yahoo.focus {
  box-shadow: 0 0 0 0.2rem rgba(93, 39, 162, 0.5);
}

.btn-yahoo.disabled, .btn-yahoo:disabled {
  color: #fff;
  background-color: #400191;
  border-color: #400191;
}

.btn-yahoo:not(:disabled):not(.disabled):active, .btn-yahoo:not(:disabled):not(.disabled).active,
.show > .btn-yahoo.dropdown-toggle {
  color: #fff;
  background-color: #2a015e;
  border-color: #240152;
}

.btn-yahoo:not(:disabled):not(.disabled):active:focus, .btn-yahoo:not(:disabled):not(.disabled).active:focus,
.show > .btn-yahoo.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(93, 39, 162, 0.5);
}

.btn-behance {
  color: #fff;
  background-color: #1769ff;
  border-color: #1769ff;
}

.btn-behance:hover {
  color: #fff;
  background-color: #0055f0;
  border-color: #0050e3;
}

.btn-behance:focus, .btn-behance.focus {
  box-shadow: 0 0 0 0.2rem rgba(58, 128, 255, 0.5);
}

.btn-behance.disabled, .btn-behance:disabled {
  color: #fff;
  background-color: #1769ff;
  border-color: #1769ff;
}

.btn-behance:not(:disabled):not(.disabled):active, .btn-behance:not(:disabled):not(.disabled).active,
.show > .btn-behance.dropdown-toggle {
  color: #fff;
  background-color: #0050e3;
  border-color: #004cd6;
}

.btn-behance:not(:disabled):not(.disabled):active:focus, .btn-behance:not(:disabled):not(.disabled).active:focus,
.show > .btn-behance.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(58, 128, 255, 0.5);
}

.btn-dropbox {
  color: #fff;
  background-color: #007ee5;
  border-color: #007ee5;
}

.btn-dropbox:hover {
  color: #fff;
  background-color: #0069bf;
  border-color: #0062b2;
}

.btn-dropbox:focus, .btn-dropbox.focus {
  box-shadow: 0 0 0 0.2rem rgba(38, 145, 233, 0.5);
}

.btn-dropbox.disabled, .btn-dropbox:disabled {
  color: #fff;
  background-color: #007ee5;
  border-color: #007ee5;
}

.btn-dropbox:not(:disabled):not(.disabled):active, .btn-dropbox:not(:disabled):not(.disabled).active,
.show > .btn-dropbox.dropdown-toggle {
  color: #fff;
  background-color: #0062b2;
  border-color: #005ba5;
}

.btn-dropbox:not(:disabled):not(.disabled):active:focus, .btn-dropbox:not(:disabled):not(.disabled).active:focus,
.show > .btn-dropbox.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(38, 145, 233, 0.5);
}

.btn-reddit {
  color: #fff;
  background-color: #ff4500;
  border-color: #ff4500;
}

.btn-reddit:hover {
  color: #fff;
  background-color: #d93b00;
  border-color: #cc3700;
}

.btn-reddit:focus, .btn-reddit.focus {
  box-shadow: 0 0 0 0.2rem rgba(255, 97, 38, 0.5);
}

.btn-reddit.disabled, .btn-reddit:disabled {
  color: #fff;
  background-color: #ff4500;
  border-color: #ff4500;
}

.btn-reddit:not(:disabled):not(.disabled):active, .btn-reddit:not(:disabled):not(.disabled).active,
.show > .btn-reddit.dropdown-toggle {
  color: #fff;
  background-color: #cc3700;
  border-color: #bf3400;
}

.btn-reddit:not(:disabled):not(.disabled):active:focus, .btn-reddit:not(:disabled):not(.disabled).active:focus,
.show > .btn-reddit.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(255, 97, 38, 0.5);
}

.btn-spotify {
  color: #fff;
  background-color: #7ab800;
  border-color: #7ab800;
}

.btn-spotify:hover {
  color: #fff;
  background-color: #619200;
  border-color: #588500;
}

.btn-spotify:focus, .btn-spotify.focus {
  box-shadow: 0 0 0 0.2rem rgba(142, 195, 38, 0.5);
}

.btn-spotify.disabled, .btn-spotify:disabled {
  color: #fff;
  background-color: #7ab800;
  border-color: #7ab800;
}

.btn-spotify:not(:disabled):not(.disabled):active, .btn-spotify:not(:disabled):not(.disabled).active,
.show > .btn-spotify.dropdown-toggle {
  color: #fff;
  background-color: #588500;
  border-color: #507800;
}

.btn-spotify:not(:disabled):not(.disabled):active:focus, .btn-spotify:not(:disabled):not(.disabled).active:focus,
.show > .btn-spotify.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(142, 195, 38, 0.5);
}

.btn-vine {
  color: #fff;
  background-color: #00bf8f;
  border-color: #00bf8f;
}

.btn-vine:hover {
  color: #fff;
  background-color: #009972;
  border-color: #008c69;
}

.btn-vine:focus, .btn-vine.focus {
  box-shadow: 0 0 0 0.2rem rgba(38, 201, 160, 0.5);
}

.btn-vine.disabled, .btn-vine:disabled {
  color: #fff;
  background-color: #00bf8f;
  border-color: #00bf8f;
}

.btn-vine:not(:disabled):not(.disabled):active, .btn-vine:not(:disabled):not(.disabled).active,
.show > .btn-vine.dropdown-toggle {
  color: #fff;
  background-color: #008c69;
  border-color: #007f5f;
}

.btn-vine:not(:disabled):not(.disabled):active:focus, .btn-vine:not(:disabled):not(.disabled).active:focus,
.show > .btn-vine.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(38, 201, 160, 0.5);
}

.btn-foursquare {
  color: #fff;
  background-color: #1073af;
  border-color: #1073af;
}

.btn-foursquare:hover {
  color: #fff;
  background-color: #0d5c8c;
  border-color: #0c5480;
}

.btn-foursquare:focus, .btn-foursquare.focus {
  box-shadow: 0 0 0 0.2rem rgba(52, 136, 187, 0.5);
}

.btn-foursquare.disabled, .btn-foursquare:disabled {
  color: #fff;
  background-color: #1073af;
  border-color: #1073af;
}

.btn-foursquare:not(:disabled):not(.disabled):active, .btn-foursquare:not(:disabled):not(.disabled).active,
.show > .btn-foursquare.dropdown-toggle {
  color: #fff;
  background-color: #0c5480;
  border-color: #0b4d75;
}

.btn-foursquare:not(:disabled):not(.disabled):active:focus, .btn-foursquare:not(:disabled):not(.disabled).active:focus,
.show > .btn-foursquare.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(52, 136, 187, 0.5);
}

.btn-vimeo {
  color: #23282c;
  background-color: #aad450;
  border-color: #aad450;
}

.btn-vimeo:hover {
  color: #23282c;
  background-color: #9bcc32;
  border-color: #93c130;
}

.btn-vimeo:focus, .btn-vimeo.focus {
  box-shadow: 0 0 0 0.2rem rgba(150, 186, 75, 0.5);
}

.btn-vimeo.disabled, .btn-vimeo:disabled {
  color: #23282c;
  background-color: #aad450;
  border-color: #aad450;
}

.btn-vimeo:not(:disabled):not(.disabled):active, .btn-vimeo:not(:disabled):not(.disabled).active,
.show > .btn-vimeo.dropdown-toggle {
  color: #23282c;
  background-color: #93c130;
  border-color: #8bb72d;
}

.btn-vimeo:not(:disabled):not(.disabled):active:focus, .btn-vimeo:not(:disabled):not(.disabled).active:focus,
.show > .btn-vimeo.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(150, 186, 75, 0.5);
}

.btn-transparent {
  color: #fff;
  background-color: transparent;
  border-color: transparent;
}

.btn [class^="icon-"],
.btn [class*=" icon-"] {
  display: inline-block;
  margin-top: -2px;
  vertical-align: middle;
}

.btn-pill {
  border-radius: 50em;
}

.btn-square {
  border-radius: 0;
}

.btn-ghost-primary {
  color: #20a8d8;
  background-color: transparent;
  background-image: none;
  border-color: transparent;
}

.btn-ghost-primary:hover {
  color: #fff;
  background-color: #20a8d8;
  border-color: #20a8d8;
}

.btn-ghost-primary:focus, .btn-ghost-primary.focus {
  box-shadow: 0 0 0 0.2rem rgba(32, 168, 216, 0.5);
}

.btn-ghost-primary.disabled, .btn-ghost-primary:disabled {
  color: #20a8d8;
  background-color: transparent;
  border-color: transparent;
}

.btn-ghost-primary:not(:disabled):not(.disabled):active, .btn-ghost-primary:not(:disabled):not(.disabled).active,
.show > .btn-ghost-primary.dropdown-toggle {
  color: #fff;
  background-color: #20a8d8;
  border-color: #20a8d8;
}

.btn-ghost-primary:not(:disabled):not(.disabled):active:focus, .btn-ghost-primary:not(:disabled):not(.disabled).active:focus,
.show > .btn-ghost-primary.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(32, 168, 216, 0.5);
}

.btn-ghost-secondary {
  color: #c8ced3;
  background-color: transparent;
  background-image: none;
  border-color: transparent;
}

.btn-ghost-secondary:hover {
  color: #23282c;
  background-color: #c8ced3;
  border-color: #c8ced3;
}

.btn-ghost-secondary:focus, .btn-ghost-secondary.focus {
  box-shadow: 0 0 0 0.2rem rgba(200, 206, 211, 0.5);
}

.btn-ghost-secondary.disabled, .btn-ghost-secondary:disabled {
  color: #c8ced3;
  background-color: transparent;
  border-color: transparent;
}

.btn-ghost-secondary:not(:disabled):not(.disabled):active, .btn-ghost-secondary:not(:disabled):not(.disabled).active,
.show > .btn-ghost-secondary.dropdown-toggle {
  color: #23282c;
  background-color: #c8ced3;
  border-color: #c8ced3;
}

.btn-ghost-secondary:not(:disabled):not(.disabled):active:focus, .btn-ghost-secondary:not(:disabled):not(.disabled).active:focus,
.show > .btn-ghost-secondary.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(200, 206, 211, 0.5);
}

.btn-ghost-success {
  color: #4dbd74;
  background-color: transparent;
  background-image: none;
  border-color: transparent;
}

.btn-ghost-success:hover {
  color: #fff;
  background-color: #36c6d3;
  border-color: #2bb8c4;
}

.btn-ghost-success:focus, .btn-ghost-success.focus {
  box-shadow: 0 0 0 0.2rem rgba(77, 189, 116, 0.5);
}

.btn-ghost-success.disabled, .btn-ghost-success:disabled {
  color: #4dbd74;
  background-color: transparent;
  border-color: transparent;
}

.btn-ghost-success:not(:disabled):not(.disabled):active, .btn-ghost-success:not(:disabled):not(.disabled).active,
.show > .btn-ghost-success.dropdown-toggle {
  color: #fff;
  background-color: #36c6d3;
  border-color: #2bb8c4;
}

.btn-ghost-success:not(:disabled):not(.disabled):active:focus, .btn-ghost-success:not(:disabled):not(.disabled).active:focus,
.show > .btn-ghost-success.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(77, 189, 116, 0.5);
}

.btn-ghost-info {
  color: #63c2de;
  background-color: transparent;
  background-image: none;
  border-color: transparent;
}

.btn-ghost-info:hover {
  color: #23282c;
  background-color: #63c2de;
  border-color: #63c2de;
}

.btn-ghost-info:focus, .btn-ghost-info.focus {
  box-shadow: 0 0 0 0.2rem rgba(99, 194, 222, 0.5);
}

.btn-ghost-info.disabled, .btn-ghost-info:disabled {
  color: #63c2de;
  background-color: transparent;
  border-color: transparent;
}

.btn-ghost-info:not(:disabled):not(.disabled):active, .btn-ghost-info:not(:disabled):not(.disabled).active,
.show > .btn-ghost-info.dropdown-toggle {
  color: #23282c;
  background-color: #63c2de;
  border-color: #63c2de;
}

.btn-ghost-info:not(:disabled):not(.disabled):active:focus, .btn-ghost-info:not(:disabled):not(.disabled).active:focus,
.show > .btn-ghost-info.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(99, 194, 222, 0.5);
}

.btn-ghost-warning {
  color: #ffc107;
  background-color: transparent;
  background-image: none;
  border-color: transparent;
}

.btn-ghost-warning:hover {
  color: #23282c;
  background-color: #ffc107;
  border-color: #ffc107;
}

.btn-ghost-warning:focus, .btn-ghost-warning.focus {
  box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);
}

.btn-ghost-warning.disabled, .btn-ghost-warning:disabled {
  color: #ffc107;
  background-color: transparent;
  border-color: transparent;
}

.btn-ghost-warning:not(:disabled):not(.disabled):active, .btn-ghost-warning:not(:disabled):not(.disabled).active,
.show > .btn-ghost-warning.dropdown-toggle {
  color: #23282c;
  background-color: #ffc107;
  border-color: #ffc107;
}

.btn-ghost-warning:not(:disabled):not(.disabled):active:focus, .btn-ghost-warning:not(:disabled):not(.disabled).active:focus,
.show > .btn-ghost-warning.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);
}

.btn-ghost-danger {
  color: #f86c6b;
  background-color: transparent;
  background-image: none;
  border-color: transparent;
}

.btn-ghost-danger:hover {
  color: #fff;
  background-color: #f86c6b;
  border-color: #f86c6b;
}

.btn-ghost-danger:focus, .btn-ghost-danger.focus {
  box-shadow: 0 0 0 0.2rem rgba(248, 108, 107, 0.5);
}

.btn-ghost-danger.disabled, .btn-ghost-danger:disabled {
  color: #f86c6b;
  background-color: transparent;
  border-color: transparent;
}

.btn-ghost-danger:not(:disabled):not(.disabled):active, .btn-ghost-danger:not(:disabled):not(.disabled).active,
.show > .btn-ghost-danger.dropdown-toggle {
  color: #fff;
  background-color: #f86c6b;
  border-color: #f86c6b;
}

.btn-ghost-danger:not(:disabled):not(.disabled):active:focus, .btn-ghost-danger:not(:disabled):not(.disabled).active:focus,
.show > .btn-ghost-danger.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(248, 108, 107, 0.5);
}

.btn-ghost-light {
  color: #f0f3f5;
  background-color: transparent;
  background-image: none;
  border-color: transparent;
}

.btn-ghost-light:hover {
  color: #23282c;
  background-color: #f0f3f5;
  border-color: #f0f3f5;
}

.btn-ghost-light:focus, .btn-ghost-light.focus {
  box-shadow: 0 0 0 0.2rem rgba(240, 243, 245, 0.5);
}

.btn-ghost-light.disabled, .btn-ghost-light:disabled {
  color: #f0f3f5;
  background-color: transparent;
  border-color: transparent;
}

.btn-ghost-light:not(:disabled):not(.disabled):active, .btn-ghost-light:not(:disabled):not(.disabled).active,
.show > .btn-ghost-light.dropdown-toggle {
  color: #23282c;
  background-color: #f0f3f5;
  border-color: #f0f3f5;
}

.btn-ghost-light:not(:disabled):not(.disabled):active:focus, .btn-ghost-light:not(:disabled):not(.disabled).active:focus,
.show > .btn-ghost-light.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(240, 243, 245, 0.5);
}

.btn-ghost-dark {
  color: #2f353a;
  background-color: transparent;
  background-image: none;
  border-color: transparent;
}

.btn-ghost-dark:hover {
  color: #fff;
  background-color: #2f353a;
  border-color: #2f353a;
}

.btn-ghost-dark:focus, .btn-ghost-dark.focus {
  box-shadow: 0 0 0 0.2rem rgba(47, 53, 58, 0.5);
}

.btn-ghost-dark.disabled, .btn-ghost-dark:disabled {
  color: #2f353a;
  background-color: transparent;
  border-color: transparent;
}

.btn-ghost-dark:not(:disabled):not(.disabled):active, .btn-ghost-dark:not(:disabled):not(.disabled).active,
.show > .btn-ghost-dark.dropdown-toggle {
  color: #fff;
  background-color: #2f353a;
  border-color: #2f353a;
}

.btn-ghost-dark:not(:disabled):not(.disabled):active:focus, .btn-ghost-dark:not(:disabled):not(.disabled).active:focus,
.show > .btn-ghost-dark.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(47, 53, 58, 0.5);
}

.callout {
  position: relative;
  padding: 0 1rem;
  margin: 1rem 0;
  border-left: 4px solid #c8ced3;
  border-radius: 0.25rem;
}

.callout .chart-wrapper {
  position: absolute;
  top: 10px;
  left: 50%;
  float: right;
  width: 50%;
}

.callout-bordered {
  border: 1px solid #c8ced3;
  border-left-width: 4px;
}

.callout code {
  border-radius: 0.25rem;
}

.callout h4 {
  margin-top: 0;
  margin-bottom: .25rem;
}

.callout p:last-child {
  margin-bottom: 0;
}

.callout + .callout {
  margin-top: -0.25rem;
}

.callout-primary {
  border-left-color: #20a8d8;
}

.callout-primary h4 {
  color: #20a8d8;
}

.callout-secondary {
  border-left-color: #c8ced3;
}

.callout-secondary h4 {
  color: #c8ced3;
}

.callout-success {
  border-left-color: #4dbd74;
}

.callout-success h4 {
  color: #4dbd74;
}

.callout-info {
  border-left-color: #63c2de;
}

.callout-info h4 {
  color: #63c2de;
}

.callout-warning {
  border-left-color: #ffc107;
}

.callout-warning h4 {
  color: #ffc107;
}

.callout-danger {
  border-left-color: #f86c6b;
}

.callout-danger h4 {
  color: #f86c6b;
}

.callout-light {
  border-left-color: #f0f3f5;
}

.callout-light h4 {
  color: #f0f3f5;
}

.callout-dark {
  border-left-color: #2f353a;
}

.callout-dark h4 {
  color: #2f353a;
}

*[dir="rtl"] .callout {
  border-right: 4px solid #c8ced3;
  border-left: 0;
}

*[dir="rtl"] .callout.callout-primary {
  border-right-color: #20a8d8;
}

*[dir="rtl"] .callout.callout-secondary {
  border-right-color: #c8ced3;
}

*[dir="rtl"] .callout.callout-success {
  border-right-color: #4dbd74;
}

*[dir="rtl"] .callout.callout-info {
  border-right-color: #63c2de;
}

*[dir="rtl"] .callout.callout-warning {
  border-right-color: #ffc107;
}

*[dir="rtl"] .callout.callout-danger {
  border-right-color: #f86c6b;
}

*[dir="rtl"] .callout.callout-light {
  border-right-color: #f0f3f5;
}

*[dir="rtl"] .callout.callout-dark {
  border-right-color: #2f353a;
}

*[dir="rtl"] .callout .chart-wrapper {
  left: 0;
  float: left;
}

.card {
  margin-bottom: 1.5rem;
}

.card.bg-primary {
  border-color: #187da0;
}

.card.bg-primary .card-header {
  background-color: #1e9ecb;
  border-color: #187da0;
}

.card.bg-secondary {
  border-color: #a5aeb7;
}

.card.bg-secondary .card-header {
  background-color: #c0c6cc;
  border-color: #a5aeb7;
}

.card.bg-success {
  border-color: #2bb8c4;
}

.card.bg-success .card-header {
  background-color: #44b76c;
  border-color: #2bb8c4;
}

.card.bg-info {
  border-color: #2eadd3;
}

.card.bg-info .card-header {
  background-color: #56bddb;
  border-color: #2eadd3;
}

.card.bg-warning {
  border-color: #c69500;
}

.card.bg-warning .card-header {
  background-color: #f7b900;
  border-color: #c69500;
}

.card.bg-danger {
  border-color: #f5302e;
}

.card.bg-danger .card-header {
  background-color: #f75d5c;
  border-color: #f5302e;
}

.card.bg-light {
  border-color: #cad4dc;
}

.card.bg-light .card-header {
  background-color: #e7ecef;
  border-color: #cad4dc;
}

.card.bg-dark {
  border-color: #121517;
}

.card.bg-dark .card-header {
  background-color: #282d32;
  border-color: #121517;
}

.card.drag,
.card .drag {
  cursor: move;
}

.card-placeholder {
  background: rgba(0, 0, 0, 0.025);
  border: 1px dashed #c8ced3;
}

.card-header > i {
  margin-right: 0.5rem;
}

.card-header .nav-tabs {
  margin-top: -0.75rem;
  margin-bottom: -0.75rem;
  border-bottom: 0;
}

.card-header .nav-tabs .nav-item {
  border-top: 0;
}

.card-header .nav-tabs .nav-link {
  padding: 0.75rem 0.625rem;
  color: #73818f;
  border-top: 0;
}

.card-header .nav-tabs .nav-link.active {
  color: #23282c;
  background: #fff;
}

*[dir="rtl"] .card-header > i {
  margin-right: 0;
  margin-left: 0.5rem;
}

.card-header-icon-bg {
  display: inline-block;
  width: 2.8125rem;
  padding: 0.75rem 0;
  margin: -0.75rem 1.25rem -0.75rem -1.25rem;
  line-height: inherit;
  color: #23282c;
  text-align: center;
  background: transparent;
  border-right: 1px solid #c8ced3;
}

.card-header-actions {
  display: inline-block;
  float: right;
  margin-right: -0.25rem;
}

*[dir="rtl"] .card-header-actions {
  float: left;
  margin-right: auto;
  margin-left: -0.25rem;
}

.card-header-action {
  padding: 0 0.25rem;
  color: #73818f;
}

.card-header-action:hover {
  color: #23282c;
  text-decoration: none;
}

.card-accent-primary {
  border-top-color: #20a8d8;
  border-top-width: 2px;
}

.card-accent-secondary {
  border-top-color: #c8ced3;
  border-top-width: 2px;
}

.card-accent-success {
  border-top-color: #4dbd74;
  border-top-width: 2px;
}

.card-accent-info {
  border-top-color: #63c2de;
  border-top-width: 2px;
}

.card-accent-warning {
  border-top-color: #ffc107;
  border-top-width: 2px;
}

.card-accent-danger {
  border-top-color: #f86c6b;
  border-top-width: 2px;
}

.card-accent-light {
  border-top-color: #f0f3f5;
  border-top-width: 2px;
}

.card-accent-dark {
  border-top-color: #2f353a;
  border-top-width: 2px;
}

.card-full {
  margin-top: -1rem;
  margin-right: -15px;
  margin-left: -15px;
  border: 0;
  border-bottom: 1px solid #c8ced3;
}

@media (min-width: 576px) {
  .card-columns.cols-2 {
    -webkit-column-count: 2;
    -moz-column-count: 2;
    column-count: 2;
  }
}

.chart-wrapper canvas {
  width: 100%;
}

base-chart.chart {
  display: block;
}

canvas {
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.chartjs-tooltip {
  position: absolute;
  z-index: 1021;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
  padding: 0.25rem 0.5rem;
  color: #fff;
  pointer-events: none;
  background: rgba(0, 0, 0, 0.7);
  opacity: 0;
  transition: all 0.25s ease;
  -webkit-transform: translate(-50%, 0);
  transform: translate(-50%, 0);
  border-radius: 0.25rem;
}

.chartjs-tooltip .tooltip-header {
  margin-bottom: 0.5rem;
}

.chartjs-tooltip .tooltip-header-item {
  font-size: 0.765625rem;
  font-weight: 700;
}

.chartjs-tooltip .tooltip-body-item {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  font-size: 0.765625rem;
  white-space: nowrap;
}

.chartjs-tooltip .tooltip-body-item-color {
  display: inline-block;
  width: 0.875rem;
  height: 0.875rem;
  margin-right: 0.875rem;
}

.chartjs-tooltip .tooltip-body-item-value {
  padding-left: 1rem;
  margin-left: auto;
  font-weight: 700;
}

.dropdown-item {
  position: relative;
  padding: 10px 20px;
  border-bottom: 1px solid #c8ced3;
}

.dropdown-item:last-child {
  border-bottom: 0;
}

.dropdown-item i {
  display: inline-block;
  width: 20px;
  margin-right: 10px;
  margin-left: -10px;
  color: #73818f;
  text-align: center;
}

.dropdown-item .badge {
  position: absolute;
  right: 10px;
  margin-top: 2px;
}

.dropdown-header {
  padding: 8px 20px;
  background: #e4e7ea;
  border-bottom: 1px solid #c8ced3;
}

.dropdown-header .btn {
  margin-top: -7px;
  color: #73818f;
}

.dropdown-header .btn:hover {
  color: #23282c;
}

.dropdown-header .btn.pull-right {
  margin-right: -20px;
}

.dropdown-menu-lg {
  width: 250px;
}

.app-header .navbar-nav .dropdown-menu {
  position: absolute;
}

.app-header .navbar-nav .dropdown-menu-right {
  right: 0;
  left: auto;
}

.app-header .navbar-nav .dropdown-menu-left {
  right: auto;
  left: 0;
}

.app-footer {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -ms-flex-align: center;
  align-items: center;
  padding: 0 1rem;
  color: #23282c;
  background: #f0f3f5;
  border-top: 1px solid #c8ced3;
}

.row.row-equal {
  padding-right: 7.5px;
  padding-left: 7.5px;
  margin-right: -15px;
  margin-left: -15px;
}

.row.row-equal [class*="col-"] {
  padding-right: 7.5px;
  padding-left: 7.5px;
}

.main .container-fluid {
  padding: 0 30px;
}

.app-header {
  position: relative;
  -ms-flex-direction: row;
  flex-direction: row;
  height: 55px;
  padding: 0;
  margin: 0;
  background-color: #fff;
  border-bottom: 1px solid #c8ced3;
}

.app-header .navbar-brand {
  display: -ms-inline-flexbox;
  display: inline-flex;
  -ms-flex-align: center;
  align-items: center;
  -ms-flex-pack: center;
  justify-content: center;
  width: 155px;
  height: 55px;
  padding: 0;
  margin-right: 0;
  background-color: transparent;
}

.app-header .navbar-brand .navbar-brand-minimized {
  display: none;
}

.app-header .navbar-toggler {
  min-width: 50px;
  padding: 0.25rem 0;
}

.app-header .navbar-toggler:hover .navbar-toggler-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='%232f353a' stroke-width='2.25' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}

.app-header .navbar-toggler-icon {
  height: 23px;
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='%2373818f' stroke-width='2.25' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}

.app-header .navbar-nav {
  -ms-flex-direction: row;
  flex-direction: row;
  -ms-flex-align: center;
  align-items: center;
}

.app-header .nav-item {
  position: relative;
  min-width: 50px;
  margin: 0;
  text-align: center;
}

.app-header .nav-item button {
  margin: 0 auto;
}

.app-header .nav-item .nav-link {
  padding-top: 0;
  padding-bottom: 0;
  background: 0;
  border: 0;
}

.app-header .nav-item .nav-link .badge {
  position: absolute;
  top: 50%;
  left: 50%;
  margin-top: -16px;
  margin-left: 0;
}

.app-header .nav-item .nav-link > .img-avatar, .app-header .nav-item .avatar.nav-link > img {
  height: 35px;
  margin: 0 10px;
}

.app-header .dropdown-menu {
  padding-bottom: 0;
  line-height: 1.5;
}

.app-header .dropdown-item {
  min-width: 180px;
}

.navbar-nav .nav-link {
  color: #73818f;
}

.navbar-nav .nav-link:hover, .navbar-nav .nav-link:focus {
  color: #2f353a;
}

.navbar-nav .open > .nav-link, .navbar-nav .open > .nav-link:hover, .navbar-nav .open > .nav-link:focus,
.navbar-nav .active > .nav-link,
.navbar-nav .active > .nav-link:hover,
.navbar-nav .active > .nav-link:focus,
.navbar-nav .nav-link.open,
.navbar-nav .nav-link.open:hover,
.navbar-nav .nav-link.open:focus,
.navbar-nav .nav-link.active,
.navbar-nav .nav-link.active:hover,
.navbar-nav .nav-link.active:focus {
  color: #2f353a;
}

.navbar-divider {
  background-color: rgba(0, 0, 0, 0.075);
}

@media (min-width: 992px) {
  .brand-minimized .app-header .navbar-brand {
    width: 50px;
    background-color: transparent;
  }
  .brand-minimized .app-header .navbar-brand .navbar-brand-full {
    display: none;
  }
  .brand-minimized .app-header .navbar-brand .navbar-brand-minimized {
    display: block;
  }
}

.input-group-prepend,
.input-group-append {
  white-space: nowrap;
  vertical-align: middle;
}

.img-avatar, .avatar > img,
.img-circle {
  max-width: 100%;
  height: auto;
  border-radius: 50em;
}

.list-group-accent .list-group-item {
  margin-bottom: 1px;
  border-top: 0;
  border-right: 0;
  border-bottom: 0;
  border-radius: 0;
}

.list-group-accent .list-group-item.list-group-item-divider {
  position: relative;
}

.list-group-accent .list-group-item.list-group-item-divider::before {
  position: absolute;
  bottom: -1px;
  left: 5%;
  width: 90%;
  height: 1px;
  content: "";
  background-color: #e4e7ea;
}

.list-group-item-accent-primary {
  border-left: 4px solid #20a8d8;
}

.list-group-item-accent-secondary {
  border-left: 4px solid #c8ced3;
}

.list-group-item-accent-success {
  border-left: 4px solid #4dbd74;
}

.list-group-item-accent-info {
  border-left: 4px solid #63c2de;
}

.list-group-item-accent-warning {
  border-left: 4px solid #ffc107;
}

.list-group-item-accent-danger {
  border-left: 4px solid #f86c6b;
}

.list-group-item-accent-light {
  border-left: 4px solid #f0f3f5;
}

.list-group-item-accent-dark {
  border-left: 4px solid #2f353a;
}

.modal-primary .modal-content {
  border-color: #20a8d8;
}

.modal-primary .modal-header {
  color: #fff;
  background-color: #20a8d8;
}

.modal-secondary .modal-content {
  border-color: #c8ced3;
}

.modal-secondary .modal-header {
  color: #fff;
  background-color: #c8ced3;
}

.modal-success .modal-content {
  border-color: #2bb8c4;
}

.modal-success .modal-header {
  color: #fff;
  background-color: #36c6d3;
}

.modal-info .modal-content {
  border-color: #63c2de;
}

.modal-info .modal-header {
  color: #fff;
  background-color: #63c2de;
}

.modal-warning .modal-content {
  border-color: #ffc107;
}

.modal-warning .modal-header {
  color: #fff;
  background-color: #ffc107;
}

.modal-danger .modal-content {
  border-color: #f86c6b;
}

.modal-danger .modal-header {
  color: #fff;
  background-color: #f86c6b;
}

.modal-light .modal-content {
  border-color: #f0f3f5;
}

.modal-light .modal-header {
  color: #fff;
  background-color: #f0f3f5;
}

.modal-dark .modal-content {
  border-color: #2f353a;
}

.modal-dark .modal-header {
  color: #fff;
  background-color: #2f353a;
}

.nav-tabs .nav-link {
  color: #73818f;
}

.nav-tabs .nav-link:hover {
  cursor: pointer;
}

.tab-content {
  margin-top: -1px;
  background: #fff;
  border: 1px solid #c8ced3;
  border-radius: 0 0 0.25rem 0.25rem;
}

.tab-content .tab-pane {
  padding: 1rem;
}

.card-block .tab-content {
  margin-top: 0;
  border: 0;
}

.nav-fill .nav-link {
  background-color: #fff;
  border-color: #c8ced3;
}

.nav-fill .nav-link + .nav-link {
  margin-left: -1px;
}

.nav-fill .nav-link.active {
  margin-top: -1px;
  border-top: 2px solid #20a8d8;
}

*[dir="rtl"] .nav {
  padding-right: 0;
}

.progress-xs {
  height: 4px;
}

.progress-sm {
  height: 8px;
}

.progress-white {
  background-color: rgba(255, 255, 255, 0.2);
}

.progress-white .progress-bar {
  background-color: #fff;
}

.progress-group {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-flow: row wrap;
  flex-flow: row wrap;
  margin-bottom: 1rem;
}

.progress-group-prepend {
  -ms-flex: 0 0 100px;
  flex: 0 0 100px;
  -ms-flex-item-align: center;
  align-self: center;
}

.progress-group-icon {
  margin: 0 1rem 0 0.25rem;
  font-size: 1.09375rem;
}

.progress-group-text {
  font-size: 0.765625rem;
  color: #73818f;
}

.progress-group-header {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-preferred-size: 100%;
  flex-basis: 100%;
  -ms-flex-align: end;
  align-items: flex-end;
  margin-bottom: 0.25rem;
}

.progress-group-bars {
  -ms-flex-positive: 1;
  flex-grow: 1;
  -ms-flex-item-align: center;
  align-self: center;
}

.progress-group-bars .progress:not(:last-child) {
  margin-bottom: 2px;
}

.progress-group-header + .progress-group-bars {
  -ms-flex-preferred-size: 100%;
  flex-basis: 100%;
}

.sidebar {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
  padding: 0;
  color: #fff;
  background: #2f353a;
}

.sidebar .sidebar-close {
  position: absolute;
  right: 0;
  display: none;
  padding: 0 1rem;
  font-size: 24px;
  font-weight: 800;
  line-height: 55px;
  color: #fff;
  background: 0;
  border: 0;
  opacity: .8;
}

.sidebar .sidebar-close:hover {
  opacity: 1;
}

.sidebar .sidebar-header {
  -ms-flex: 0 0 auto;
  flex: 0 0 auto;
  padding: 0.75rem 1rem;
  text-align: center;
  background: rgba(0, 0, 0, 0.2);
}

.sidebar .sidebar-form .form-control {
  color: #fff;
  background: #181b1e;
  border: 0;
}

.sidebar .sidebar-form .form-control::-webkit-input-placeholder {
  color: rgba(255, 255, 255, 0.7);
}

.sidebar .sidebar-form .form-control::-moz-placeholder {
  color: rgba(255, 255, 255, 0.7);
}

.sidebar .sidebar-form .form-control:-ms-input-placeholder {
  color: rgba(255, 255, 255, 0.7);
}

.sidebar .sidebar-form .form-control::-ms-input-placeholder {
  color: rgba(255, 255, 255, 0.7);
}

.sidebar .sidebar-form .form-control::placeholder {
  color: rgba(255, 255, 255, 0.7);
}

.sidebar .sidebar-nav {
  position: relative;
  -ms-flex: 1;
  flex: 1;
  overflow-x: hidden;
  overflow-y: auto;
  width: 200px;
}

.sidebar .nav {
  width: 200px;
  -ms-flex-direction: column;
  flex-direction: column;
  min-height: 100%;
  padding: 0;
}

.sidebar .nav-title {
  padding: 0.75rem 1rem;
  font-size: 80%;
  font-weight: 700;
  color: #e4e7ea;
  text-transform: uppercase;
}

.sidebar .nav-divider {
  height: 10px;
}

.sidebar .nav-item {
  position: relative;
  margin: 0;
  transition: background .3s ease-in-out;
}

.sidebar .nav-dropdown-items {
  max-height: 0;
  padding: 0;
  margin: 0;
  overflow-y: hidden;
  transition: max-height .3s ease-in-out;
}

.sidebar .nav-dropdown-items .nav-item {
  padding: 0;
  list-style: none;
}

.sidebar .nav-link {
  display: block;
  padding: 0.75rem 1rem;
  color: #fff;
  text-decoration: none;
  background: transparent;
}

.sidebar .nav-link .nav-icon {
  display: inline-block;
  width: 1.09375rem;
  margin: 0 0.5rem 0 0;
  font-size: 0.875rem;
  color: #73818f;
  text-align: center;
}

.sidebar .nav-link .badge {
  float: right;
  margin-top: 2px;
}

.sidebar .nav-link.active {
  color: #fff;
  background: #b98b037a;
}

.sidebar .nav-link.active .nav-icon {
  color: #fff;
}

.sidebar .nav-link:hover {
  color: #fff;
  background: #bb9b00;
}

.sidebar .nav-link:hover .nav-icon {
  color: #fff;
}

.sidebar .nav-link:hover.nav-dropdown-toggle::before {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 11 14'%3E%3Cpath fill='%23fff' d='M9.148 2.352l-4.148 4.148 4.148 4.148q0.148 0.148 0.148 0.352t-0.148 0.352l-1.297 1.297q-0.148 0.148-0.352 0.148t-0.352-0.148l-5.797-5.797q-0.148-0.148-0.148-0.352t0.148-0.352l5.797-5.797q0.148-0.148 0.352-0.148t0.352 0.148l1.297 1.297q0.148 0.148 0.148 0.352t-0.148 0.352z'/%3E%3C/svg%3E");
}

.sidebar .nav-link.disabled {
  color: #b3b3b3;
  cursor: default;
  background: transparent;
}

.sidebar .nav-link.disabled .nav-icon {
  color: #73818f;
}

.sidebar .nav-link.disabled:hover {
  color: #b3b3b3;
}

.sidebar .nav-link.disabled:hover .nav-icon {
  color: #73818f;
}

.sidebar .nav-link.disabled:hover.nav-dropdown-toggle::before {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 11 14'%3E%3Cpath fill='%23fff' d='M9.148 2.352l-4.148 4.148 4.148 4.148q0.148 0.148 0.148 0.352t-0.148 0.352l-1.297 1.297q-0.148 0.148-0.352 0.148t-0.352-0.148l-5.797-5.797q-0.148-0.148-0.148-0.352t0.148-0.352l5.797-5.797q0.148-0.148 0.352-0.148t0.352 0.148l1.297 1.297q0.148 0.148 0.148 0.352t-0.148 0.352z'/%3E%3C/svg%3E");
}

.sidebar .nav-link.nav-link-primary {
  background: #20a8d8;
}

.sidebar .nav-link.nav-link-primary .nav-icon {
  color: rgba(255, 255, 255, 0.7);
}

.sidebar .nav-link.nav-link-primary:hover {
  background: #1d97c2;
}

.sidebar .nav-link.nav-link-primary:hover i {
  color: #fff;
}

.sidebar .nav-link.nav-link-secondary {
  background: #c8ced3;
}

.sidebar .nav-link.nav-link-secondary .nav-icon {
  color: rgba(255, 255, 255, 0.7);
}

.sidebar .nav-link.nav-link-secondary:hover {
  background: #bac1c8;
}

.sidebar .nav-link.nav-link-secondary:hover i {
  color: #fff;
}

.sidebar .nav-link.nav-link-success {
  background: #4dbd74;
}

.sidebar .nav-link.nav-link-success .nav-icon {
  color: rgba(255, 255, 255, 0.7);
}

.sidebar .nav-link.nav-link-success:hover {
  background: #41af67;
}

.sidebar .nav-link.nav-link-success:hover i {
  color: #fff;
}

.sidebar .nav-link.nav-link-info {
  background: #63c2de;
}

.sidebar .nav-link.nav-link-info .nav-icon {
  color: rgba(255, 255, 255, 0.7);
}

.sidebar .nav-link.nav-link-info:hover {
  background: #4ebada;
}

.sidebar .nav-link.nav-link-info:hover i {
  color: #fff;
}

.sidebar .nav-link.nav-link-warning {
  background: #ffc107;
}

.sidebar .nav-link.nav-link-warning .nav-icon {
  color: rgba(255, 255, 255, 0.7);
}

.sidebar .nav-link.nav-link-warning:hover {
  background: #edb100;
}

.sidebar .nav-link.nav-link-warning:hover i {
  color: #fff;
}

.sidebar .nav-link.nav-link-danger {
  background: #f86c6b;
}

.sidebar .nav-link.nav-link-danger .nav-icon {
  color: rgba(255, 255, 255, 0.7);
}

.sidebar .nav-link.nav-link-danger:hover {
  background: #f75453;
}

.sidebar .nav-link.nav-link-danger:hover i {
  color: #fff;
}

.sidebar .nav-link.nav-link-light {
  background: #f0f3f5;
}

.sidebar .nav-link.nav-link-light .nav-icon {
  color: rgba(255, 255, 255, 0.7);
}

.sidebar .nav-link.nav-link-light:hover {
  background: #e1e7eb;
}

.sidebar .nav-link.nav-link-light:hover i {
  color: #fff;
}

.sidebar .nav-link.nav-link-dark {
  background: #2f353a;
}

.sidebar .nav-link.nav-link-dark .nav-icon {
  color: rgba(255, 255, 255, 0.7);
}

.sidebar .nav-link.nav-link-dark:hover {
  background: #24282c;
}

.sidebar .nav-link.nav-link-dark:hover i {
  color: #fff;
}

.sidebar .nav-dropdown-toggle {
  position: relative;
}

.sidebar .nav-dropdown-toggle::before {
  position: absolute;
  top: 50%;
  right: 1rem;
  display: block;
  width: 8px;
  height: 8px;
  padding: 0;
  margin-top: -4px;
  content: "";
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 11 14'%3E%3Cpath fill='%2373818f' d='M9.148 2.352l-4.148 4.148 4.148 4.148q0.148 0.148 0.148 0.352t-0.148 0.352l-1.297 1.297q-0.148 0.148-0.352 0.148t-0.352-0.148l-5.797-5.797q-0.148-0.148-0.148-0.352t0.148-0.352l5.797-5.797q0.148-0.148 0.352-0.148t0.352 0.148l1.297 1.297q0.148 0.148 0.148 0.352t-0.148 0.352z'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: center;
  transition: -webkit-transform .3s;
  transition: transform .3s;
  transition: transform .3s, -webkit-transform .3s;
}

.sidebar .nav-dropdown-toggle .badge {
  margin-right: 16px;
}

.sidebar .nav-dropdown.open {
  background: rgba(0, 0, 0, 0.2);
}

.sidebar .nav-dropdown.open > .nav-dropdown-items {
  max-height: 1500px;
}

.sidebar .nav-dropdown.open .nav-link {
  color: #fff;
  border-left: 0;
}

.sidebar .nav-dropdown.open .nav-link.disabled {
  color: #b3b3b3;
  background: transparent;
}

.sidebar .nav-dropdown.open .nav-link.disabled:hover {
  color: #b3b3b3;
}

.sidebar .nav-dropdown.open .nav-link.disabled:hover .nav-icon {
  color: #73818f;
}

.sidebar .nav-dropdown.open > .nav-dropdown-toggle::before {
  -webkit-transform: rotate(-90deg);
  transform: rotate(-90deg);
}

.sidebar .nav-dropdown.open .nav-dropdown.open {
  border-left: 0;
}

.sidebar .nav-label {
  display: block;
  padding: 0.09375rem 1rem;
  color: #e4e7ea;
}

.sidebar .nav-label:hover {
  color: #fff;
  text-decoration: none;
}

.sidebar .nav-label .nav-icon {
  width: 20px;
  margin: -3px 0.5rem 0 0;
  font-size: 10px;
  color: #73818f;
  text-align: center;
  vertical-align: middle;
}

.sidebar .progress {
  background-color: #515c64 !important;
}

.sidebar .sidebar-footer {
  -ms-flex: 0 0 auto;
  flex: 0 0 auto;
  padding: 0.75rem 1rem;
  background: rgba(0, 0, 0, 0.2);
}

.sidebar .sidebar-minimizer {
  position: relative;
  -ms-flex: 0 0 50px;
  flex: 0 0 50px;
  cursor: pointer;
  background-color: rgba(0, 0, 0, 0.2);
  border: 0;
}

.sidebar .sidebar-minimizer::before {
  position: absolute;
  top: 0;
  right: 0;
  width: 50px;
  height: 50px;
  content: "";
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 11 14'%3E%3Cpath fill='%2373818f' d='M9.148 2.352l-4.148 4.148 4.148 4.148q0.148 0.148 0.148 0.352t-0.148 0.352l-1.297 1.297q-0.148 0.148-0.352 0.148t-0.352-0.148l-5.797-5.797q-0.148-0.148-0.148-0.352t0.148-0.352l5.797-5.797q0.148-0.148 0.352-0.148t0.352 0.148l1.297 1.297q0.148 0.148 0.148 0.352t-0.148 0.352z'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: center;
  background-size: 12.5px;
  transition: .3s;
}

.sidebar .sidebar-minimizer:focus, .sidebar .sidebar-minimizer.focus {
  outline: 0;
}

.sidebar .sidebar-minimizer:hover {
  background-color: rgba(0, 0, 0, 0.3);
}

.sidebar .sidebar-minimizer:hover::before {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 11 14'%3E%3Cpath fill='%23fff' d='M9.148 2.352l-4.148 4.148 4.148 4.148q0.148 0.148 0.148 0.352t-0.148 0.352l-1.297 1.297q-0.148 0.148-0.352 0.148t-0.352-0.148l-5.797-5.797q-0.148-0.148-0.148-0.352t0.148-0.352l5.797-5.797q0.148-0.148 0.352-0.148t0.352 0.148l1.297 1.297q0.148 0.148 0.148 0.352t-0.148 0.352z'/%3E%3C/svg%3E");
}

@media (min-width: 992px) {
  .sidebar-compact .sidebar .sidebar-nav {
    width: 150px;
  }
  .sidebar-compact .sidebar .nav {
    width: 150px;
  }
  .sidebar-compact .sidebar .d-compact-none {
    display: none;
  }
  .sidebar-compact .sidebar .nav-title {
    text-align: center;
  }
  .sidebar-compact .sidebar .nav-item {
    width: 150px;
    border-left: 0;
  }
  .sidebar-compact .sidebar .nav-link {
    text-align: center;
  }
  .sidebar-compact .sidebar .nav-link .nav-icon {
    display: block;
    width: 100%;
    margin: 0.25rem 0;
    font-size: 24px;
  }
  .sidebar-compact .sidebar .nav-link .badge {
    position: absolute;
    top: 18px;
    right: 10px;
  }
  .sidebar-compact .sidebar .nav-link.nav-dropdown-toggle::before {
    top: 30px;
  }
  .sidebar-minimized .sidebar {
    z-index: 1019;
  }
  .sidebar-minimized .sidebar .sidebar-nav {
    overflow: visible;
    width: 50px;
  }
  .sidebar-minimized .sidebar .nav {
    width: 50px;
  }
  .sidebar-minimized .sidebar .d-minimized-none,
  .sidebar-minimized .sidebar .nav-divider,
  .sidebar-minimized .sidebar .nav-label,
  .sidebar-minimized .sidebar .nav-title,
  .sidebar-minimized .sidebar .sidebar-footer,
  .sidebar-minimized .sidebar .sidebar-form,
  .sidebar-minimized .sidebar .sidebar-header {
    display: none;
  }
  .sidebar-minimized .sidebar .sidebar-minimizer {
    position: fixed;
    bottom: 0;
    width: 50px;
    height: 50px;
    background-color: #24282c;
  }
  .sidebar-minimized .sidebar .sidebar-nav {
    padding-bottom: 50px;
  }
  .sidebar-minimized .sidebar .sidebar-minimizer::before {
    width: 100%;
    -webkit-transform: rotate(-180deg);
    transform: rotate(-180deg);
  }
  .sidebar-minimized .sidebar .nav-item {
    width: 50px;
    overflow: hidden;
  }
  .sidebar-minimized .sidebar .nav-item:hover {
    width: 250px;
    overflow: visible;
  }
  .sidebar-minimized .sidebar .nav-item:hover > .nav-link {
    background: #20a8d8;
  }
  .sidebar-minimized .sidebar .nav-item:hover > .nav-link .nav-icon {
    color: #fff;
  }
  .sidebar-minimized .sidebar .nav-item:hover .nav-link.disabled,
  .sidebar-minimized .sidebar .nav-item:hover .nav-link :disabled {
    background: #2f353a;
  }
  .sidebar-minimized .sidebar .nav-item:hover .nav-link.disabled .nav-icon,
  .sidebar-minimized .sidebar .nav-item:hover .nav-link :disabled .nav-icon {
    color: #73818f;
  }
  .sidebar-minimized .sidebar section :not(.nav-dropdown-items) > .nav-item:last-child::after {
    display: block;
    margin-bottom: 50px;
    content: "";
  }
  .sidebar-minimized .sidebar .nav-link {
    position: relative;
    padding-left: 0;
    margin: 0;
    white-space: nowrap;
    border-left: 0;
  }
  .sidebar-minimized .sidebar .nav-link .nav-icon {
    display: block;
    float: left;
    width: 50px;
    font-size: 18px;
  }
  .sidebar-minimized .sidebar .nav-link .badge {
    position: absolute;
    right: 15px;
    display: none;
  }
  .sidebar-minimized .sidebar .nav-link:hover {
    width: 250px;
    background: #20a8d8;
  }
  .sidebar-minimized .sidebar .nav-link:hover .badge {
    display: inline;
  }
  .sidebar-minimized .sidebar .nav-link.nav-dropdown-toggle::before {
    display: none;
  }
  .sidebar-minimized .sidebar .nav-dropdown-items .nav-item {
    width: 200px;
  }
  .sidebar-minimized .sidebar .nav-dropdown-items .nav-item .nav-link {
    width: 200px;
  }
  .sidebar-minimized .sidebar .nav > .nav-dropdown > .nav-dropdown-items {
    display: none;
    max-height: 1000px;
    background: #2f353a;
  }
  .sidebar-minimized .sidebar .nav > .nav-dropdown:hover {
    background: #20a8d8;
  }
  .sidebar-minimized .sidebar .nav > .nav-dropdown:hover > .nav-dropdown-items {
    position: absolute;
    left: 50px;
    display: inline;
  }
  *[dir="rtl"] .sidebar-minimized .sidebar .nav {
    list-style-image: url("data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7");
  }
  *[dir="rtl"] .sidebar-minimized .sidebar .nav .divider {
    height: 0;
  }
  *[dir="rtl"] .sidebar-minimized .sidebar .sidebar-minimizer::before {
    width: 100%;
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  *[dir="rtl"] .sidebar-minimized .sidebar .nav-link {
    padding-right: 0;
  }
  *[dir="rtl"] .sidebar-minimized .sidebar .nav-link .nav-icon {
    float: right;
  }
  *[dir="rtl"] .sidebar-minimized .sidebar .nav-link .badge {
    right: auto;
    left: 15px;
  }
  *[dir="rtl"] .sidebar-minimized .sidebar .nav-link:hover .badge {
    display: inline;
  }
  *[dir="rtl"] .sidebar-minimized .sidebar .nav > .nav-dropdown > .nav-dropdown-items {
    display: none;
    max-height: 1000px;
    background: #2f353a;
  }
  *[dir="rtl"] .sidebar-minimized .sidebar .nav > .nav-dropdown:hover {
    background: #20a8d8;
  }
  *[dir="rtl"] .sidebar-minimized .sidebar .nav > .nav-dropdown:hover > .nav-dropdown-items {
    position: absolute;
    left: 0;
    display: inline;
  }
}

*[dir="rtl"] .sidebar .nav-dropdown-toggle::before {
  position: absolute;
  right: auto;
  left: 1rem;
  -webkit-transform: rotate(180deg);
  transform: rotate(180deg);
}

*[dir="rtl"] .sidebar .nav-dropdown.open > .nav-dropdown-toggle::before {
  -webkit-transform: rotate(270deg);
  transform: rotate(270deg);
}

*[dir="rtl"] .sidebar .nav-link .nav-icon {
  margin: 0 0 0 0.5rem;
}

*[dir="rtl"] .sidebar .nav-link .badge {
  float: left;
  margin-top: 2px;
}

*[dir="rtl"] .sidebar .nav-link.nav-dropdown-toggle .badge {
  margin-right: auto;
  margin-left: 16px;
}

*[dir="rtl"] .sidebar .sidebar-minimizer::before {
  right: auto;
  left: 0;
  -webkit-transform: rotate(180deg);
  transform: rotate(180deg);
}

*[dir="rtl"] .sidebar-toggler {
  margin-right: 0 !important;
}

.switch {
  display: inline-block;
  width: 40px;
  height: 26px;
}

.switch-input {
  display: none;
}

.switch-slider {
  position: relative;
  display: block;
  height: inherit;
  cursor: pointer;
  background-color: #fff;
  border: 1px solid #c8ced3;
  transition: .15s ease-out;
  border-radius: 0.25rem;
}

.switch-slider::before {
  position: absolute;
  top: 2px;
  left: 2px;
  box-sizing: border-box;
  width: 20px;
  height: 20px;
  content: "";
  background-color: #fff;
  border: 1px solid #c8ced3;
  transition: .15s ease-out;
  border-radius: 0.125rem;
}

.switch-input:checked ~ .switch-slider::before {
  -webkit-transform: translateX(14px);
  transform: translateX(14px);
}

.switch-input:disabled ~ .switch-slider {
  cursor: not-allowed;
  opacity: .5;
}

.switch-lg {
  width: 48px;
  height: 30px;
}

.switch-lg .switch-slider {
  font-size: 12px;
}

.switch-lg .switch-slider::before {
  width: 24px;
  height: 24px;
}

.switch-lg .switch-slider::after {
  font-size: 12px;
}

.switch-lg .switch-input:checked ~ .switch-slider::before {
  -webkit-transform: translateX(18px);
  transform: translateX(18px);
}

.switch-sm {
  width: 32px;
  height: 22px;
}

.switch-sm .switch-slider {
  font-size: 8px;
}

.switch-sm .switch-slider::before {
  width: 16px;
  height: 16px;
}

.switch-sm .switch-slider::after {
  font-size: 8px;
}

.switch-sm .switch-input:checked ~ .switch-slider::before {
  -webkit-transform: translateX(10px);
  transform: translateX(10px);
}

.switch-label {
  width: 48px;
}

.switch-label .switch-slider::before {
  z-index: 2;
}

.switch-label .switch-slider::after {
  position: absolute;
  top: 50%;
  right: 1px;
  z-index: 1;
  width: 50%;
  margin-top: -.5em;
  font-size: 10px;
  font-weight: 600;
  line-height: 1;
  color: #c8ced3;
  text-align: center;
  text-transform: uppercase;
  content: attr(data-unchecked);
  transition: inherit;
}

.switch-label .switch-input:checked ~ .switch-slider::before {
  -webkit-transform: translateX(22px);
  transform: translateX(22px);
}

.switch-label .switch-input:checked ~ .switch-slider::after {
  left: 1px;
  color: #fff;
  content: attr(data-checked);
}

.switch-label.switch-lg {
  width: 56px;
  height: 30px;
}

.switch-label.switch-lg .switch-slider {
  font-size: 12px;
}

.switch-label.switch-lg .switch-slider::before {
  width: 24px;
  height: 24px;
}

.switch-label.switch-lg .switch-slider::after {
  font-size: 12px;
}

.switch-label.switch-lg .switch-input:checked ~ .switch-slider::before {
  -webkit-transform: translateX(26px);
  transform: translateX(26px);
}

.switch-label.switch-sm {
  width: 40px;
  height: 22px;
}

.switch-label.switch-sm .switch-slider {
  font-size: 8px;
}

.switch-label.switch-sm .switch-slider::before {
  width: 16px;
  height: 16px;
}

.switch-label.switch-sm .switch-slider::after {
  font-size: 8px;
}

.switch-label.switch-sm .switch-input:checked ~ .switch-slider::before {
  -webkit-transform: translateX(18px);
  transform: translateX(18px);
}

.switch-3d .switch-slider {
  background-color: #f0f3f5;
  border-radius: 50em;
}

.switch-3d .switch-slider::before {
  top: -1px;
  left: -1px;
  width: 26px;
  height: 26px;
  border: 0;
  border-radius: 50em;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

.switch-3d.switch-lg {
  width: 48px;
  height: 30px;
}

.switch-3d.switch-lg .switch-slider::before {
  width: 30px;
  height: 30px;
}

.switch-3d.switch-lg .switch-input:checked ~ .switch-slider::before {
  -webkit-transform: translateX(18px);
  transform: translateX(18px);
}

.switch-3d.switch-sm {
  width: 32px;
  height: 22px;
}

.switch-3d.switch-sm .switch-slider::before {
  width: 22px;
  height: 22px;
}

.switch-3d.switch-sm .switch-input:checked ~ .switch-slider::before {
  -webkit-transform: translateX(10px);
  transform: translateX(10px);
}

.switch-primary .switch-input:checked + .switch-slider {
  background-color: #20a8d8;
  border-color: #1985ac;
}

.switch-primary .switch-input:checked + .switch-slider::before {
  border-color: #1985ac;
}

.switch-outline-primary .switch-input:checked + .switch-slider {
  background-color: #fff;
  border-color: #20a8d8;
}

.switch-outline-primary .switch-input:checked + .switch-slider::before {
  border-color: #20a8d8;
}

.switch-outline-primary .switch-input:checked + .switch-slider::after {
  color: #20a8d8;
}

.switch-outline-primary-alt .switch-input:checked + .switch-slider {
  background-color: #fff;
  border-color: #20a8d8;
}

.switch-outline-primary-alt .switch-input:checked + .switch-slider::before {
  background-color: #20a8d8;
  border-color: #20a8d8;
}

.switch-outline-primary-alt .switch-input:checked + .switch-slider::after {
  color: #20a8d8;
}

.switch-secondary .switch-input:checked + .switch-slider {
  background-color: #c8ced3;
  border-color: #acb5bc;
}

.switch-secondary .switch-input:checked + .switch-slider::before {
  border-color: #acb5bc;
}

.switch-outline-secondary .switch-input:checked + .switch-slider {
  background-color: #fff;
  border-color: #c8ced3;
}

.switch-outline-secondary .switch-input:checked + .switch-slider::before {
  border-color: #c8ced3;
}

.switch-outline-secondary .switch-input:checked + .switch-slider::after {
  color: #c8ced3;
}

.switch-outline-secondary-alt .switch-input:checked + .switch-slider {
  background-color: #fff;
  border-color: #c8ced3;
}

.switch-outline-secondary-alt .switch-input:checked + .switch-slider::before {
  background-color: #c8ced3;
  border-color: #c8ced3;
}

.switch-outline-secondary-alt .switch-input:checked + .switch-slider::after {
  color: #c8ced3;
}

.switch-success .switch-input:checked + .switch-slider {
  background-color: #36c6d3;
  border-color: #2bb8c4;
}

.switch-success .switch-input:checked + .switch-slider::before {
  border-color: #2bb8c4;
}

.switch-outline-success .switch-input:checked + .switch-slider {
  background-color: #fff;
  border-color: #2bb8c4;
}

.switch-outline-success .switch-input:checked + .switch-slider::before {
  border-color: #2bb8c4;
}

.switch-outline-success .switch-input:checked + .switch-slider::after {
  color: #4dbd74;
}

.switch-outline-success-alt .switch-input:checked + .switch-slider {
  background-color: #fff;
  border-color: #2bb8c4;
}

.switch-outline-success-alt .switch-input:checked + .switch-slider::before {
  background-color: #36c6d3;
  border-color: #2bb8c4;
}

.switch-outline-success-alt .switch-input:checked + .switch-slider::after {
  color: #4dbd74;
}

.switch-info .switch-input:checked + .switch-slider {
  background-color: #63c2de;
  border-color: #39b2d5;
}

.switch-info .switch-input:checked + .switch-slider::before {
  border-color: #39b2d5;
}

.switch-outline-info .switch-input:checked + .switch-slider {
  background-color: #fff;
  border-color: #63c2de;
}

.switch-outline-info .switch-input:checked + .switch-slider::before {
  border-color: #63c2de;
}

.switch-outline-info .switch-input:checked + .switch-slider::after {
  color: #63c2de;
}

.switch-outline-info-alt .switch-input:checked + .switch-slider {
  background-color: #fff;
  border-color: #63c2de;
}

.switch-outline-info-alt .switch-input:checked + .switch-slider::before {
  background-color: #63c2de;
  border-color: #63c2de;
}

.switch-outline-info-alt .switch-input:checked + .switch-slider::after {
  color: #63c2de;
}

.switch-warning .switch-input:checked + .switch-slider {
  background-color: #ffc107;
  border-color: #d39e00;
}

.switch-warning .switch-input:checked + .switch-slider::before {
  border-color: #d39e00;
}

.switch-outline-warning .switch-input:checked + .switch-slider {
  background-color: #fff;
  border-color: #ffc107;
}

.switch-outline-warning .switch-input:checked + .switch-slider::before {
  border-color: #ffc107;
}

.switch-outline-warning .switch-input:checked + .switch-slider::after {
  color: #ffc107;
}

.switch-outline-warning-alt .switch-input:checked + .switch-slider {
  background-color: #fff;
  border-color: #ffc107;
}

.switch-outline-warning-alt .switch-input:checked + .switch-slider::before {
  background-color: #ffc107;
  border-color: #ffc107;
}

.switch-outline-warning-alt .switch-input:checked + .switch-slider::after {
  color: #ffc107;
}

.switch-danger .switch-input:checked + .switch-slider {
  background-color: #f86c6b;
  border-color: #f63c3a;
}

.switch-danger .switch-input:checked + .switch-slider::before {
  border-color: #f63c3a;
}

.switch-outline-danger .switch-input:checked + .switch-slider {
  background-color: #fff;
  border-color: #f86c6b;
}

.switch-outline-danger .switch-input:checked + .switch-slider::before {
  border-color: #f86c6b;
}

.switch-outline-danger .switch-input:checked + .switch-slider::after {
  color: #f86c6b;
}

.switch-outline-danger-alt .switch-input:checked + .switch-slider {
  background-color: #fff;
  border-color: #f86c6b;
}

.switch-outline-danger-alt .switch-input:checked + .switch-slider::before {
  background-color: #f86c6b;
  border-color: #f86c6b;
}

.switch-outline-danger-alt .switch-input:checked + .switch-slider::after {
  color: #f86c6b;
}

.switch-light .switch-input:checked + .switch-slider {
  background-color: #f0f3f5;
  border-color: #d1dbe1;
}

.switch-light .switch-input:checked + .switch-slider::before {
  border-color: #d1dbe1;
}

.switch-outline-light .switch-input:checked + .switch-slider {
  background-color: #fff;
  border-color: #f0f3f5;
}

.switch-outline-light .switch-input:checked + .switch-slider::before {
  border-color: #f0f3f5;
}

.switch-outline-light .switch-input:checked + .switch-slider::after {
  color: #f0f3f5;
}

.switch-outline-light-alt .switch-input:checked + .switch-slider {
  background-color: #fff;
  border-color: #f0f3f5;
}

.switch-outline-light-alt .switch-input:checked + .switch-slider::before {
  background-color: #f0f3f5;
  border-color: #f0f3f5;
}

.switch-outline-light-alt .switch-input:checked + .switch-slider::after {
  color: #f0f3f5;
}

.switch-dark .switch-input:checked + .switch-slider {
  background-color: #2f353a;
  border-color: #181b1e;
}

.switch-dark .switch-input:checked + .switch-slider::before {
  border-color: #181b1e;
}

.switch-outline-dark .switch-input:checked + .switch-slider {
  background-color: #fff;
  border-color: #2f353a;
}

.switch-outline-dark .switch-input:checked + .switch-slider::before {
  border-color: #2f353a;
}

.switch-outline-dark .switch-input:checked + .switch-slider::after {
  color: #2f353a;
}

.switch-outline-dark-alt .switch-input:checked + .switch-slider {
  background-color: #fff;
  border-color: #2f353a;
}

.switch-outline-dark-alt .switch-input:checked + .switch-slider::before {
  background-color: #2f353a;
  border-color: #2f353a;
}

.switch-outline-dark-alt .switch-input:checked + .switch-slider::after {
  color: #2f353a;
}

.switch-pill .switch-slider {
  border-radius: 50em;
}

.switch-pill .switch-slider::before {
  border-radius: 50em;
}

.table-outline {
  border: 1px solid #c8ced3;
}

.table-outline td {
  vertical-align: middle;
}

.table-align-middle td {
  vertical-align: middle;
}

.table-clear td {
  border: 0;
}

@media all and (-ms-high-contrast: none) {
  html {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
  }
}

.app,
app-dashboard,
app-root {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
  min-height: 100vh;
}

.app-header {
  -ms-flex: 0 0 55px;
  flex: 0 0 55px;
}

.app-footer {
  -ms-flex: 0 0 50px;
  flex: 0 0 50px;
}

.app-body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: row;
  flex-direction: row;
  -ms-flex-positive: 1;
  flex-grow: 1;
  overflow-x: hidden;
}

.app-body .main {
  -ms-flex: 1;
  flex: 1;
  min-width: 0;
}

.app-body .sidebar {
  -ms-flex: 0 0 200px;
  flex: 0 0 200px;
  -ms-flex-order: -1;
  order: -1;
}

.app-body .aside-menu {
  -ms-flex: 0 0 250px;
  flex: 0 0 250px;
}

html:not([dir="rtl"]) .sidebar {
  margin-left: -200px;
}

html:not([dir="rtl"]) .aside-menu {
  right: 0;
  margin-right: -250px;
}

html[dir="rtl"] .sidebar {
  margin-right: -200px;
}

html[dir="rtl"] .aside-menu {
  left: 0;
  margin-left: -250px;
}

@media (min-width: 992px) {
  .header-fixed .app-header {
    position: fixed;
    z-index: 1020;
    width: 100%;
  }
  .header-fixed .app-body {
    margin-top: 55px;
  }
  .sidebar-fixed .sidebar {
    position: fixed;
    z-index: 1019;
    width: 200px;
    height: 100vh;
  }
  .sidebar-fixed .app-header + .app-body .sidebar {
    height: calc(100vh - 55px);
  }
  .sidebar-compact .sidebar {
    -ms-flex: 0 0 150px;
    flex: 0 0 150px;
  }
  .sidebar-compact.sidebar-fixed .sidebar {
    width: 150px;
  }
  .sidebar-compact .sidebar-minimizer {
    display: none;
  }
  .sidebar-minimized .sidebar {
    -ms-flex: 0 0 50px;
    flex: 0 0 50px;
  }
  .sidebar-minimized.sidebar-fixed .sidebar {
    width: 50px;
  }
  .sidebar-off-canvas .sidebar {
    position: fixed;
    z-index: 1019;
    height: 100%;
  }
  .sidebar-off-canvas .app-header + .app-body .sidebar {
    height: calc(100vh - 55px);
  }
  html:not([dir="rtl"]) .sidebar-compact .sidebar {
    margin-left: -150px;
  }
  html:not([dir="rtl"]) .sidebar-minimized .sidebar {
    margin-left: -50px;
  }
  html[dir="rtl"] .sidebar-compact .sidebar {
    margin-right: -150px;
  }
  html[dir="rtl"] .sidebar-minimized .sidebar {
    margin-right: -50px;
  }
  .aside-menu-fixed .aside-menu {
    position: fixed;
    height: 100%;
  }
  .aside-menu-fixed .aside-menu .tab-content {
    height: calc(100vh - 2.375rem - 55px);
  }
  .aside-menu-fixed .app-header + .app-body .aside-menu {
    height: calc(100vh - 55px);
  }
  .aside-menu-off-canvas .aside-menu {
    position: fixed;
    z-index: 1019;
    height: 100%;
  }
  .aside-menu-off-canvas .app-header + .app-body .aside-menu {
    height: calc(100vh - 55px);
  }
  html:not([dir="rtl"]) .aside-menu-fixed .aside-menu,
  html:not([dir="rtl"]) .aside-menu-off-canvas .aside-menu {
    right: 0;
  }
  html[dir="rtl"] .aside-menu-fixed .aside-menu,
  html[dir="rtl"] .aside-menu-off-canvas .aside-menu {
    left: 0;
  }
}

.breadcrumb-fixed .main {
  padding-top: 3.875rem;
}

.breadcrumb-fixed .breadcrumb {
  position: fixed;
  top: 55px;
  right: 0;
  left: 0;
  z-index: 1017;
}

html:not([dir="rtl"]) .sidebar-show .sidebar,
html:not([dir="rtl"]) .sidebar-show .sidebar {
  margin-left: 0;
}

html:not([dir="rtl"]) .aside-menu-show .aside-menu,
html:not([dir="rtl"]) .aside-menu-show .aside-menu {
  margin-right: 0;
}

html[dir="rtl"] .sidebar-show .sidebar,
html[dir="rtl"] .sidebar-show .sidebar {
  margin-right: 0;
}

html[dir="rtl"] .aside-menu-show .aside-menu,
html[dir="rtl"] .aside-menu-show .aside-menu {
  margin-left: 0;
}

@-webkit-keyframes opacity {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

@keyframes opacity {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

@media (max-width: 575.98px) {
  .sidebar-show .main,
  .aside-menu-show .main {
    position: relative;
  }
  .sidebar-show .main::before,
  .aside-menu-show .main::before {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1018;
    width: 100%;
    height: 100%;
    content: "";
    background: rgba(0, 0, 0, 0.7);
    -webkit-animation: opacity 0.25s;
    animation: opacity 0.25s;
  }
}

@media (min-width: 576px) {
  html:not([dir="rtl"]) .sidebar-sm-show .sidebar,
  html:not([dir="rtl"]) .sidebar-show .sidebar {
    margin-left: 0;
  }
  html:not([dir="rtl"]) .sidebar-sm-show.sidebar-fixed .main,
  html:not([dir="rtl"]) .sidebar-sm-show.sidebar-fixed .app-footer,
  html:not([dir="rtl"]) .sidebar-show.sidebar-fixed .main,
  html:not([dir="rtl"]) .sidebar-show.sidebar-fixed .app-footer {
    margin-left: 200px;
  }
  html:not([dir="rtl"]) .sidebar-sm-show.sidebar-fixed.sidebar-compact .main,
  html:not([dir="rtl"]) .sidebar-sm-show.sidebar-fixed.sidebar-compact .app-footer,
  html:not([dir="rtl"]) .sidebar-show.sidebar-fixed.sidebar-compact .main,
  html:not([dir="rtl"]) .sidebar-show.sidebar-fixed.sidebar-compact .app-footer {
    margin-left: 150px;
  }
  html:not([dir="rtl"]) .sidebar-sm-show.sidebar-fixed.sidebar-minimized .main,
  html:not([dir="rtl"]) .sidebar-sm-show.sidebar-fixed.sidebar-minimized .app-footer,
  html:not([dir="rtl"]) .sidebar-show.sidebar-fixed.sidebar-minimized .main,
  html:not([dir="rtl"]) .sidebar-show.sidebar-fixed.sidebar-minimized .app-footer {
    margin-left: 200px;
  }
  html:not([dir="rtl"]) .sidebar-sm-show.breadcrumb-fixed .breadcrumb,
  html:not([dir="rtl"]) .sidebar-show.breadcrumb-fixed .breadcrumb {
    left: 200px;
  }
  html:not([dir="rtl"]) .sidebar-sm-show.breadcrumb-fixed.sidebar-compact .breadcrumb,
  html:not([dir="rtl"]) .sidebar-show.breadcrumb-fixed.sidebar-compact .breadcrumb {
    left: 150px;
  }
  html:not([dir="rtl"]) .sidebar-sm-show.breadcrumb-fixed.sidebar-minimized .breadcrumb,
  html:not([dir="rtl"]) .sidebar-show.breadcrumb-fixed.sidebar-minimized .breadcrumb {
    left: 50px;
  }
  html:not([dir="rtl"]) .aside-menu-show .aside-menu,
  html:not([dir="rtl"]) .aside-menu-sm-show .aside-menu {
    margin-right: 0;
  }
  html:not([dir="rtl"]) .aside-menu-show.aside-menu-fixed .main,
  html:not([dir="rtl"]) .aside-menu-show.aside-menu-fixed .app-footer,
  html:not([dir="rtl"]) .aside-menu-sm-show.aside-menu-fixed .main,
  html:not([dir="rtl"]) .aside-menu-sm-show.aside-menu-fixed .app-footer {
    margin-right: 250px;
  }
  html:not([dir="rtl"]) .aside-menu-show.breadcrumb-fixed .breadcrumb,
  html:not([dir="rtl"]) .aside-menu-sm-show.breadcrumb-fixed .breadcrumb {
    right: 250px;
  }
  html[dir="rtl"] .sidebar-sm-show .sidebar,
  html[dir="rtl"] .sidebar-show .sidebar {
    margin-right: 0;
  }
  html[dir="rtl"] .sidebar-sm-show.sidebar-fixed .main,
  html[dir="rtl"] .sidebar-sm-show.sidebar-fixed .app-footer,
  html[dir="rtl"] .sidebar-show.sidebar-fixed .main,
  html[dir="rtl"] .sidebar-show.sidebar-fixed .app-footer {
    margin-right: 200px;
  }
  html[dir="rtl"] .sidebar-sm-show.sidebar-fixed.sidebar-compact .main,
  html[dir="rtl"] .sidebar-sm-show.sidebar-fixed.sidebar-compact .app-footer,
  html[dir="rtl"] .sidebar-show.sidebar-fixed.sidebar-compact .main,
  html[dir="rtl"] .sidebar-show.sidebar-fixed.sidebar-compact .app-footer {
    margin-right: 150px;
  }
  html[dir="rtl"] .sidebar-sm-show.sidebar-fixed.sidebar-minimized .main,
  html[dir="rtl"] .sidebar-sm-show.sidebar-fixed.sidebar-minimized .app-footer,
  html[dir="rtl"] .sidebar-show.sidebar-fixed.sidebar-minimized .main,
  html[dir="rtl"] .sidebar-show.sidebar-fixed.sidebar-minimized .app-footer {
    margin-right: 200px;
  }
  html[dir="rtl"] .sidebar-sm-show.breadcrumb-fixed .breadcrumb,
  html[dir="rtl"] .sidebar-show.breadcrumb-fixed .breadcrumb {
    right: 200px;
  }
  html[dir="rtl"] .sidebar-sm-show.breadcrumb-fixed.sidebar-compact .breadcrumb,
  html[dir="rtl"] .sidebar-show.breadcrumb-fixed.sidebar-compact .breadcrumb {
    right: 150px;
  }
  html[dir="rtl"] .sidebar-sm-show.breadcrumb-fixed.sidebar-minimized .breadcrumb,
  html[dir="rtl"] .sidebar-show.breadcrumb-fixed.sidebar-minimized .breadcrumb {
    right: 50px;
  }
  html[dir="rtl"] .aside-menu-show .aside-menu,
  html[dir="rtl"] .aside-menu-sm-show .aside-menu {
    margin-left: 0;
  }
  html[dir="rtl"] .aside-menu-show.aside-menu-fixed .main,
  html[dir="rtl"] .aside-menu-show.aside-menu-fixed .app-footer,
  html[dir="rtl"] .aside-menu-sm-show.aside-menu-fixed .main,
  html[dir="rtl"] .aside-menu-sm-show.aside-menu-fixed .app-footer {
    margin-left: 250px;
  }
  html[dir="rtl"] .aside-menu-show.breadcrumb-fixed .breadcrumb,
  html[dir="rtl"] .aside-menu-sm-show.breadcrumb-fixed .breadcrumb {
    left: 250px;
  }
  @-webkit-keyframes opacity {
    0% {
      opacity: 0;
    }
    100% {
      opacity: 1;
    }
  }
  @keyframes opacity {
    0% {
      opacity: 0;
    }
    100% {
      opacity: 1;
    }
  }
}

@media (min-width: 768px) {
  html:not([dir="rtl"]) .sidebar-md-show .sidebar,
  html:not([dir="rtl"]) .sidebar-show .sidebar {
    margin-left: 0;
  }
  html:not([dir="rtl"]) .sidebar-md-show.sidebar-fixed .main,
  html:not([dir="rtl"]) .sidebar-md-show.sidebar-fixed .app-footer,
  html:not([dir="rtl"]) .sidebar-show.sidebar-fixed .main,
  html:not([dir="rtl"]) .sidebar-show.sidebar-fixed .app-footer {
    margin-left: 200px;
  }
  html:not([dir="rtl"]) .sidebar-md-show.sidebar-fixed.sidebar-compact .main,
  html:not([dir="rtl"]) .sidebar-md-show.sidebar-fixed.sidebar-compact .app-footer,
  html:not([dir="rtl"]) .sidebar-show.sidebar-fixed.sidebar-compact .main,
  html:not([dir="rtl"]) .sidebar-show.sidebar-fixed.sidebar-compact .app-footer {
    margin-left: 150px;
  }
  html:not([dir="rtl"]) .sidebar-md-show.sidebar-fixed.sidebar-minimized .main,
  html:not([dir="rtl"]) .sidebar-md-show.sidebar-fixed.sidebar-minimized .app-footer,
  html:not([dir="rtl"]) .sidebar-show.sidebar-fixed.sidebar-minimized .main,
  html:not([dir="rtl"]) .sidebar-show.sidebar-fixed.sidebar-minimized .app-footer {
    margin-left: 200px;
  }
  html:not([dir="rtl"]) .sidebar-md-show.breadcrumb-fixed .breadcrumb,
  html:not([dir="rtl"]) .sidebar-show.breadcrumb-fixed .breadcrumb {
    left: 200px;
  }
  html:not([dir="rtl"]) .sidebar-md-show.breadcrumb-fixed.sidebar-compact .breadcrumb,
  html:not([dir="rtl"]) .sidebar-show.breadcrumb-fixed.sidebar-compact .breadcrumb {
    left: 150px;
  }
  html:not([dir="rtl"]) .sidebar-md-show.breadcrumb-fixed.sidebar-minimized .breadcrumb,
  html:not([dir="rtl"]) .sidebar-show.breadcrumb-fixed.sidebar-minimized .breadcrumb {
    left: 50px;
  }
  html:not([dir="rtl"]) .aside-menu-show .aside-menu,
  html:not([dir="rtl"]) .aside-menu-md-show .aside-menu {
    margin-right: 0;
  }
  html:not([dir="rtl"]) .aside-menu-show.aside-menu-fixed .main,
  html:not([dir="rtl"]) .aside-menu-show.aside-menu-fixed .app-footer,
  html:not([dir="rtl"]) .aside-menu-md-show.aside-menu-fixed .main,
  html:not([dir="rtl"]) .aside-menu-md-show.aside-menu-fixed .app-footer {
    margin-right: 250px;
  }
  html:not([dir="rtl"]) .aside-menu-show.breadcrumb-fixed .breadcrumb,
  html:not([dir="rtl"]) .aside-menu-md-show.breadcrumb-fixed .breadcrumb {
    right: 250px;
  }
  html[dir="rtl"] .sidebar-md-show .sidebar,
  html[dir="rtl"] .sidebar-show .sidebar {
    margin-right: 0;
  }
  html[dir="rtl"] .sidebar-md-show.sidebar-fixed .main,
  html[dir="rtl"] .sidebar-md-show.sidebar-fixed .app-footer,
  html[dir="rtl"] .sidebar-show.sidebar-fixed .main,
  html[dir="rtl"] .sidebar-show.sidebar-fixed .app-footer {
    margin-right: 200px;
  }
  html[dir="rtl"] .sidebar-md-show.sidebar-fixed.sidebar-compact .main,
  html[dir="rtl"] .sidebar-md-show.sidebar-fixed.sidebar-compact .app-footer,
  html[dir="rtl"] .sidebar-show.sidebar-fixed.sidebar-compact .main,
  html[dir="rtl"] .sidebar-show.sidebar-fixed.sidebar-compact .app-footer {
    margin-right: 150px;
  }
  html[dir="rtl"] .sidebar-md-show.sidebar-fixed.sidebar-minimized .main,
  html[dir="rtl"] .sidebar-md-show.sidebar-fixed.sidebar-minimized .app-footer,
  html[dir="rtl"] .sidebar-show.sidebar-fixed.sidebar-minimized .main,
  html[dir="rtl"] .sidebar-show.sidebar-fixed.sidebar-minimized .app-footer {
    margin-right: 200px;
  }
  html[dir="rtl"] .sidebar-md-show.breadcrumb-fixed .breadcrumb,
  html[dir="rtl"] .sidebar-show.breadcrumb-fixed .breadcrumb {
    right: 200px;
  }
  html[dir="rtl"] .sidebar-md-show.breadcrumb-fixed.sidebar-compact .breadcrumb,
  html[dir="rtl"] .sidebar-show.breadcrumb-fixed.sidebar-compact .breadcrumb {
    right: 150px;
  }
  html[dir="rtl"] .sidebar-md-show.breadcrumb-fixed.sidebar-minimized .breadcrumb,
  html[dir="rtl"] .sidebar-show.breadcrumb-fixed.sidebar-minimized .breadcrumb {
    right: 50px;
  }
  html[dir="rtl"] .aside-menu-show .aside-menu,
  html[dir="rtl"] .aside-menu-md-show .aside-menu {
    margin-left: 0;
  }
  html[dir="rtl"] .aside-menu-show.aside-menu-fixed .main,
  html[dir="rtl"] .aside-menu-show.aside-menu-fixed .app-footer,
  html[dir="rtl"] .aside-menu-md-show.aside-menu-fixed .main,
  html[dir="rtl"] .aside-menu-md-show.aside-menu-fixed .app-footer {
    margin-left: 250px;
  }
  html[dir="rtl"] .aside-menu-show.breadcrumb-fixed .breadcrumb,
  html[dir="rtl"] .aside-menu-md-show.breadcrumb-fixed .breadcrumb {
    left: 250px;
  }
  @-webkit-keyframes opacity {
    0% {
      opacity: 0;
    }
    100% {
      opacity: 1;
    }
  }
  @keyframes opacity {
    0% {
      opacity: 0;
    }
    100% {
      opacity: 1;
    }
  }
}

@media (min-width: 992px) {
  html:not([dir="rtl"]) .sidebar-lg-show .sidebar,
  html:not([dir="rtl"]) .sidebar-show .sidebar {
    margin-left: 0;
  }
  html:not([dir="rtl"]) .sidebar-lg-show.sidebar-fixed .main,
  html:not([dir="rtl"]) .sidebar-lg-show.sidebar-fixed .app-footer,
  html:not([dir="rtl"]) .sidebar-show.sidebar-fixed .main,
  html:not([dir="rtl"]) .sidebar-show.sidebar-fixed .app-footer {
    margin-left: 200px;
  }
  html:not([dir="rtl"]) .sidebar-lg-show.sidebar-fixed.sidebar-compact .main,
  html:not([dir="rtl"]) .sidebar-lg-show.sidebar-fixed.sidebar-compact .app-footer,
  html:not([dir="rtl"]) .sidebar-show.sidebar-fixed.sidebar-compact .main,
  html:not([dir="rtl"]) .sidebar-show.sidebar-fixed.sidebar-compact .app-footer {
    margin-left: 150px;
  }
  html:not([dir="rtl"]) .sidebar-lg-show.sidebar-fixed.sidebar-minimized .main,
  html:not([dir="rtl"]) .sidebar-lg-show.sidebar-fixed.sidebar-minimized .app-footer,
  html:not([dir="rtl"]) .sidebar-show.sidebar-fixed.sidebar-minimized .main,
  html:not([dir="rtl"]) .sidebar-show.sidebar-fixed.sidebar-minimized .app-footer {
    margin-left: 50px;
  }
  html:not([dir="rtl"]) .sidebar-lg-show.breadcrumb-fixed .breadcrumb,
  html:not([dir="rtl"]) .sidebar-show.breadcrumb-fixed .breadcrumb {
    left: 200px;
  }
  html:not([dir="rtl"]) .sidebar-lg-show.breadcrumb-fixed.sidebar-compact .breadcrumb,
  html:not([dir="rtl"]) .sidebar-show.breadcrumb-fixed.sidebar-compact .breadcrumb {
    left: 150px;
  }
  html:not([dir="rtl"]) .sidebar-lg-show.breadcrumb-fixed.sidebar-minimized .breadcrumb,
  html:not([dir="rtl"]) .sidebar-show.breadcrumb-fixed.sidebar-minimized .breadcrumb {
    left: 50px;
  }
  html:not([dir="rtl"]) .aside-menu-show .aside-menu,
  html:not([dir="rtl"]) .aside-menu-lg-show .aside-menu {
    margin-right: 0;
  }
  html:not([dir="rtl"]) .aside-menu-show.aside-menu-fixed .main,
  html:not([dir="rtl"]) .aside-menu-show.aside-menu-fixed .app-footer,
  html:not([dir="rtl"]) .aside-menu-lg-show.aside-menu-fixed .main,
  html:not([dir="rtl"]) .aside-menu-lg-show.aside-menu-fixed .app-footer {
    margin-right: 250px;
  }
  html:not([dir="rtl"]) .aside-menu-show.breadcrumb-fixed .breadcrumb,
  html:not([dir="rtl"]) .aside-menu-lg-show.breadcrumb-fixed .breadcrumb {
    right: 250px;
  }
  html[dir="rtl"] .sidebar-lg-show .sidebar,
  html[dir="rtl"] .sidebar-show .sidebar {
    margin-right: 0;
  }
  html[dir="rtl"] .sidebar-lg-show.sidebar-fixed .main,
  html[dir="rtl"] .sidebar-lg-show.sidebar-fixed .app-footer,
  html[dir="rtl"] .sidebar-show.sidebar-fixed .main,
  html[dir="rtl"] .sidebar-show.sidebar-fixed .app-footer {
    margin-right: 200px;
  }
  html[dir="rtl"] .sidebar-lg-show.sidebar-fixed.sidebar-compact .main,
  html[dir="rtl"] .sidebar-lg-show.sidebar-fixed.sidebar-compact .app-footer,
  html[dir="rtl"] .sidebar-show.sidebar-fixed.sidebar-compact .main,
  html[dir="rtl"] .sidebar-show.sidebar-fixed.sidebar-compact .app-footer {
    margin-right: 150px;
  }
  html[dir="rtl"] .sidebar-lg-show.sidebar-fixed.sidebar-minimized .main,
  html[dir="rtl"] .sidebar-lg-show.sidebar-fixed.sidebar-minimized .app-footer,
  html[dir="rtl"] .sidebar-show.sidebar-fixed.sidebar-minimized .main,
  html[dir="rtl"] .sidebar-show.sidebar-fixed.sidebar-minimized .app-footer {
    margin-right: 50px;
  }
  html[dir="rtl"] .sidebar-lg-show.breadcrumb-fixed .breadcrumb,
  html[dir="rtl"] .sidebar-show.breadcrumb-fixed .breadcrumb {
    right: 200px;
  }
  html[dir="rtl"] .sidebar-lg-show.breadcrumb-fixed.sidebar-compact .breadcrumb,
  html[dir="rtl"] .sidebar-show.breadcrumb-fixed.sidebar-compact .breadcrumb {
    right: 150px;
  }
  html[dir="rtl"] .sidebar-lg-show.breadcrumb-fixed.sidebar-minimized .breadcrumb,
  html[dir="rtl"] .sidebar-show.breadcrumb-fixed.sidebar-minimized .breadcrumb {
    right: 50px;
  }
  html[dir="rtl"] .aside-menu-show .aside-menu,
  html[dir="rtl"] .aside-menu-lg-show .aside-menu {
    margin-left: 0;
  }
  html[dir="rtl"] .aside-menu-show.aside-menu-fixed .main,
  html[dir="rtl"] .aside-menu-show.aside-menu-fixed .app-footer,
  html[dir="rtl"] .aside-menu-lg-show.aside-menu-fixed .main,
  html[dir="rtl"] .aside-menu-lg-show.aside-menu-fixed .app-footer {
    margin-left: 250px;
  }
  html[dir="rtl"] .aside-menu-show.breadcrumb-fixed .breadcrumb,
  html[dir="rtl"] .aside-menu-lg-show.breadcrumb-fixed .breadcrumb {
    left: 250px;
  }
  @-webkit-keyframes opacity {
    0% {
      opacity: 0;
    }
    100% {
      opacity: 1;
    }
  }
  @keyframes opacity {
    0% {
      opacity: 0;
    }
    100% {
      opacity: 1;
    }
  }
}

@media (min-width: 1200px) {
  html:not([dir="rtl"]) .sidebar-xl-show .sidebar,
  html:not([dir="rtl"]) .sidebar-show .sidebar {
    margin-left: 0;
  }
  html:not([dir="rtl"]) .sidebar-xl-show.sidebar-fixed .main,
  html:not([dir="rtl"]) .sidebar-xl-show.sidebar-fixed .app-footer,
  html:not([dir="rtl"]) .sidebar-show.sidebar-fixed .main,
  html:not([dir="rtl"]) .sidebar-show.sidebar-fixed .app-footer {
    margin-left: 200px;
  }
  html:not([dir="rtl"]) .sidebar-xl-show.sidebar-fixed.sidebar-compact .main,
  html:not([dir="rtl"]) .sidebar-xl-show.sidebar-fixed.sidebar-compact .app-footer,
  html:not([dir="rtl"]) .sidebar-show.sidebar-fixed.sidebar-compact .main,
  html:not([dir="rtl"]) .sidebar-show.sidebar-fixed.sidebar-compact .app-footer {
    margin-left: 150px;
  }
  html:not([dir="rtl"]) .sidebar-xl-show.sidebar-fixed.sidebar-minimized .main,
  html:not([dir="rtl"]) .sidebar-xl-show.sidebar-fixed.sidebar-minimized .app-footer,
  html:not([dir="rtl"]) .sidebar-show.sidebar-fixed.sidebar-minimized .main,
  html:not([dir="rtl"]) .sidebar-show.sidebar-fixed.sidebar-minimized .app-footer {
    margin-left: 50px;
  }
  html:not([dir="rtl"]) .sidebar-xl-show.breadcrumb-fixed .breadcrumb,
  html:not([dir="rtl"]) .sidebar-show.breadcrumb-fixed .breadcrumb {
    left: 200px;
  }
  html:not([dir="rtl"]) .sidebar-xl-show.breadcrumb-fixed.sidebar-compact .breadcrumb,
  html:not([dir="rtl"]) .sidebar-show.breadcrumb-fixed.sidebar-compact .breadcrumb {
    left: 150px;
  }
  html:not([dir="rtl"]) .sidebar-xl-show.breadcrumb-fixed.sidebar-minimized .breadcrumb,
  html:not([dir="rtl"]) .sidebar-show.breadcrumb-fixed.sidebar-minimized .breadcrumb {
    left: 50px;
  }
  html:not([dir="rtl"]) .aside-menu-show .aside-menu,
  html:not([dir="rtl"]) .aside-menu-xl-show .aside-menu {
    margin-right: 0;
  }
  html:not([dir="rtl"]) .aside-menu-show.aside-menu-fixed .main,
  html:not([dir="rtl"]) .aside-menu-show.aside-menu-fixed .app-footer,
  html:not([dir="rtl"]) .aside-menu-xl-show.aside-menu-fixed .main,
  html:not([dir="rtl"]) .aside-menu-xl-show.aside-menu-fixed .app-footer {
    margin-right: 250px;
  }
  html:not([dir="rtl"]) .aside-menu-show.breadcrumb-fixed .breadcrumb,
  html:not([dir="rtl"]) .aside-menu-xl-show.breadcrumb-fixed .breadcrumb {
    right: 250px;
  }
  html[dir="rtl"] .sidebar-xl-show .sidebar,
  html[dir="rtl"] .sidebar-show .sidebar {
    margin-right: 0;
  }
  html[dir="rtl"] .sidebar-xl-show.sidebar-fixed .main,
  html[dir="rtl"] .sidebar-xl-show.sidebar-fixed .app-footer,
  html[dir="rtl"] .sidebar-show.sidebar-fixed .main,
  html[dir="rtl"] .sidebar-show.sidebar-fixed .app-footer {
    margin-right: 200px;
  }
  html[dir="rtl"] .sidebar-xl-show.sidebar-fixed.sidebar-compact .main,
  html[dir="rtl"] .sidebar-xl-show.sidebar-fixed.sidebar-compact .app-footer,
  html[dir="rtl"] .sidebar-show.sidebar-fixed.sidebar-compact .main,
  html[dir="rtl"] .sidebar-show.sidebar-fixed.sidebar-compact .app-footer {
    margin-right: 150px;
  }
  html[dir="rtl"] .sidebar-xl-show.sidebar-fixed.sidebar-minimized .main,
  html[dir="rtl"] .sidebar-xl-show.sidebar-fixed.sidebar-minimized .app-footer,
  html[dir="rtl"] .sidebar-show.sidebar-fixed.sidebar-minimized .main,
  html[dir="rtl"] .sidebar-show.sidebar-fixed.sidebar-minimized .app-footer {
    margin-right: 50px;
  }
  html[dir="rtl"] .sidebar-xl-show.breadcrumb-fixed .breadcrumb,
  html[dir="rtl"] .sidebar-show.breadcrumb-fixed .breadcrumb {
    right: 200px;
  }
  html[dir="rtl"] .sidebar-xl-show.breadcrumb-fixed.sidebar-compact .breadcrumb,
  html[dir="rtl"] .sidebar-show.breadcrumb-fixed.sidebar-compact .breadcrumb {
    right: 150px;
  }
  html[dir="rtl"] .sidebar-xl-show.breadcrumb-fixed.sidebar-minimized .breadcrumb,
  html[dir="rtl"] .sidebar-show.breadcrumb-fixed.sidebar-minimized .breadcrumb {
    right: 50px;
  }
  html[dir="rtl"] .aside-menu-show .aside-menu,
  html[dir="rtl"] .aside-menu-xl-show .aside-menu {
    margin-left: 0;
  }
  html[dir="rtl"] .aside-menu-show.aside-menu-fixed .main,
  html[dir="rtl"] .aside-menu-show.aside-menu-fixed .app-footer,
  html[dir="rtl"] .aside-menu-xl-show.aside-menu-fixed .main,
  html[dir="rtl"] .aside-menu-xl-show.aside-menu-fixed .app-footer {
    margin-left: 250px;
  }
  html[dir="rtl"] .aside-menu-show.breadcrumb-fixed .breadcrumb,
  html[dir="rtl"] .aside-menu-xl-show.breadcrumb-fixed .breadcrumb {
    left: 250px;
  }
  @-webkit-keyframes opacity {
    0% {
      opacity: 0;
    }
    100% {
      opacity: 1;
    }
  }
  @keyframes opacity {
    0% {
      opacity: 0;
    }
    100% {
      opacity: 1;
    }
  }
}

.footer-fixed .app-footer {
  position: fixed;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1020;
  height: 50px;
}

.footer-fixed .app-body {
  margin-bottom: 50px;
}

.app-header,
.app-footer,
.sidebar,
.main,
.aside-menu {
  transition: margin-left 0.25s, margin-right 0.25s, width 0.25s, flex 0.25s;
  transition: margin-left 0.25s, margin-right 0.25s, width 0.25s, flex 0.25s, -ms-flex 0.25s;
}

.sidebar-nav {
  transition: width 0.25s;
}

.breadcrumb {
  transition: left 0.25s, right 0.25s, width 0.25s;
}

@media (max-width: 991.98px) {
  .app-header {
    position: fixed;
    z-index: 1020;
    width: 100%;
    text-align: center;
    background-color: #fff;
  }
  /* .app-header .navbar-toggler {
    color: #fff;
  } */
  .app-header .navbar-brand {
    position: absolute;
    top: 0;
    left: 50%;
    margin-left: -77.5px;
  }
  .app-body {
    margin-top: 55px;
  }
  .sidebar {
    position: fixed;
    z-index: 1019;
    width: 200px;
    height: calc(100vh - 55px);
  }
  .sidebar-minimizer {
    display: none;
  }
  .aside-menu {
    position: fixed;
    height: 100%;
  }
}

hr.transparent {
  border-top: 1px solid transparent;
}

.bg-primary,
.bg-success,
.bg-info,
.bg-warning,
.bg-danger,
.bg-dark {
  color: #fff;
}

.bg-facebook {
  background-color: #3b5998 !important;
}

a.bg-facebook:hover, a.bg-facebook:focus,
button.bg-facebook:hover,
button.bg-facebook:focus {
  background-color: #2d4373 !important;
}

.bg-twitter {
  background-color: #00aced !important;
}

a.bg-twitter:hover, a.bg-twitter:focus,
button.bg-twitter:hover,
button.bg-twitter:focus {
  background-color: #0087ba !important;
}

.bg-linkedin {
  background-color: #4875b4 !important;
}

a.bg-linkedin:hover, a.bg-linkedin:focus,
button.bg-linkedin:hover,
button.bg-linkedin:focus {
  background-color: #395d90 !important;
}

.bg-google-plus {
  background-color: #d34836 !important;
}

a.bg-google-plus:hover, a.bg-google-plus:focus,
button.bg-google-plus:hover,
button.bg-google-plus:focus {
  background-color: #b03626 !important;
}

.bg-flickr {
  background-color: #ff0084 !important;
}

a.bg-flickr:hover, a.bg-flickr:focus,
button.bg-flickr:hover,
button.bg-flickr:focus {
  background-color: #cc006a !important;
}

.bg-tumblr {
  background-color: #32506d !important;
}

a.bg-tumblr:hover, a.bg-tumblr:focus,
button.bg-tumblr:hover,
button.bg-tumblr:focus {
  background-color: #22364a !important;
}

.bg-xing {
  background-color: #026466 !important;
}

a.bg-xing:hover, a.bg-xing:focus,
button.bg-xing:hover,
button.bg-xing:focus {
  background-color: #013334 !important;
}

.bg-github {
  background-color: #4183c4 !important;
}

a.bg-github:hover, a.bg-github:focus,
button.bg-github:hover,
button.bg-github:focus {
  background-color: #3269a0 !important;
}

.bg-html5 {
  background-color: #e34f26 !important;
}

a.bg-html5:hover, a.bg-html5:focus,
button.bg-html5:hover,
button.bg-html5:focus {
  background-color: #be3c18 !important;
}

.bg-openid {
  background-color: #f78c40 !important;
}

a.bg-openid:hover, a.bg-openid:focus,
button.bg-openid:hover,
button.bg-openid:focus {
  background-color: #f56f0f !important;
}

.bg-stack-overflow {
  background-color: #fe7a15 !important;
}

a.bg-stack-overflow:hover, a.bg-stack-overflow:focus,
button.bg-stack-overflow:hover,
button.bg-stack-overflow:focus {
  background-color: #df6101 !important;
}

.bg-youtube {
  background-color: #b00 !important;
}

a.bg-youtube:hover, a.bg-youtube:focus,
button.bg-youtube:hover,
button.bg-youtube:focus {
  background-color: #880000 !important;
}

.bg-css3 {
  background-color: #0170ba !important;
}

a.bg-css3:hover, a.bg-css3:focus,
button.bg-css3:hover,
button.bg-css3:focus {
  background-color: #015187 !important;
}

.bg-dribbble {
  background-color: #ea4c89 !important;
}

a.bg-dribbble:hover, a.bg-dribbble:focus,
button.bg-dribbble:hover,
button.bg-dribbble:focus {
  background-color: #e51e6b !important;
}

.bg-instagram {
  background-color: #517fa4 !important;
}

a.bg-instagram:hover, a.bg-instagram:focus,
button.bg-instagram:hover,
button.bg-instagram:focus {
  background-color: #406582 !important;
}

.bg-pinterest {
  background-color: #cb2027 !important;
}

a.bg-pinterest:hover, a.bg-pinterest:focus,
button.bg-pinterest:hover,
button.bg-pinterest:focus {
  background-color: #9f191f !important;
}

.bg-vk {
  background-color: #45668e !important;
}

a.bg-vk:hover, a.bg-vk:focus,
button.bg-vk:hover,
button.bg-vk:focus {
  background-color: #344d6c !important;
}

.bg-yahoo {
  background-color: #400191 !important;
}

a.bg-yahoo:hover, a.bg-yahoo:focus,
button.bg-yahoo:hover,
button.bg-yahoo:focus {
  background-color: #2a015e !important;
}

.bg-behance {
  background-color: #1769ff !important;
}

a.bg-behance:hover, a.bg-behance:focus,
button.bg-behance:hover,
button.bg-behance:focus {
  background-color: #0050e3 !important;
}

.bg-dropbox {
  background-color: #007ee5 !important;
}

a.bg-dropbox:hover, a.bg-dropbox:focus,
button.bg-dropbox:hover,
button.bg-dropbox:focus {
  background-color: #0062b2 !important;
}

.bg-reddit {
  background-color: #ff4500 !important;
}

a.bg-reddit:hover, a.bg-reddit:focus,
button.bg-reddit:hover,
button.bg-reddit:focus {
  background-color: #cc3700 !important;
}

.bg-spotify {
  background-color: #7ab800 !important;
}

a.bg-spotify:hover, a.bg-spotify:focus,
button.bg-spotify:hover,
button.bg-spotify:focus {
  background-color: #588500 !important;
}

.bg-vine {
  background-color: #00bf8f !important;
}

a.bg-vine:hover, a.bg-vine:focus,
button.bg-vine:hover,
button.bg-vine:focus {
  background-color: #008c69 !important;
}

.bg-foursquare {
  background-color: #1073af !important;
}

a.bg-foursquare:hover, a.bg-foursquare:focus,
button.bg-foursquare:hover,
button.bg-foursquare:focus {
  background-color: #0c5480 !important;
}

.bg-vimeo {
  background-color: #aad450 !important;
}

a.bg-vimeo:hover, a.bg-vimeo:focus,
button.bg-vimeo:hover,
button.bg-vimeo:focus {
  background-color: #93c130 !important;
}

.bg-blue {
  background-color: #20a8d8 !important;
}

a.bg-blue:hover, a.bg-blue:focus,
button.bg-blue:hover,
button.bg-blue:focus {
  background-color: #1985ac !important;
}

.bg-indigo {
  background-color: #6610f2 !important;
}

a.bg-indigo:hover, a.bg-indigo:focus,
button.bg-indigo:hover,
button.bg-indigo:focus {
  background-color: #510bc4 !important;
}

.bg-purple {
  background-color: #6f42c1 !important;
}

a.bg-purple:hover, a.bg-purple:focus,
button.bg-purple:hover,
button.bg-purple:focus {
  background-color: #59339d !important;
}

.bg-pink {
  background-color: #e83e8c !important;
}

a.bg-pink:hover, a.bg-pink:focus,
button.bg-pink:hover,
button.bg-pink:focus {
  background-color: #d91a72 !important;
}

.bg-red {
  background-color: #f86c6b !important;
}

a.bg-red:hover, a.bg-red:focus,
button.bg-red:hover,
button.bg-red:focus {
  background-color: #f63c3a !important;
}

.bg-orange {
  background-color: #f8cb00 !important;
}

a.bg-orange:hover, a.bg-orange:focus,
button.bg-orange:hover,
button.bg-orange:focus {
  background-color: #c5a100 !important;
}

.bg-yellow {
  background-color: #ffc107 !important;
}

a.bg-yellow:hover, a.bg-yellow:focus,
button.bg-yellow:hover,
button.bg-yellow:focus {
  background-color: #d39e00 !important;
}

.bg-green {
  background-color: #36c6d3 !important;
}

a.bg-green:hover, a.bg-green:focus,
button.bg-green:hover,
button.bg-green:focus {
  background-color: #36c6d3 !important;
}

.bg-teal {
  background-color: #20c997 !important;
}

a.bg-teal:hover, a.bg-teal:focus,
button.bg-teal:hover,
button.bg-teal:focus {
  background-color: #199d76 !important;
}

.bg-cyan {
  background-color: #17a2b8 !important;
}

a.bg-cyan:hover, a.bg-cyan:focus,
button.bg-cyan:hover,
button.bg-cyan:focus {
  background-color: #117a8b !important;
}

.bg-white {
  background-color: #fff !important;
}

a.bg-white:hover, a.bg-white:focus,
button.bg-white:hover,
button.bg-white:focus {
  background-color: #e6e6e6 !important;
}

.bg-gray {
  background-color: #73818f !important;
}

a.bg-gray:hover, a.bg-gray:focus,
button.bg-gray:hover,
button.bg-gray:focus {
  background-color: #5c6873 !important;
}

.bg-gray-dark {
  background-color: #2f353a !important;
}

a.bg-gray-dark:hover, a.bg-gray-dark:focus,
button.bg-gray-dark:hover,
button.bg-gray-dark:focus {
  background-color: #181b1e !important;
}

.bg-light-blue {
  background-color: #63c2de !important;
}

a.bg-light-blue:hover, a.bg-light-blue:focus,
button.bg-light-blue:hover,
button.bg-light-blue:focus {
  background-color: #39b2d5 !important;
}

.bg-gray-100 {
  background-color: #f0f3f5 !important;
}

a.bg-gray-100:hover, a.bg-gray-100:focus,
button.bg-gray-100:hover,
button.bg-gray-100:focus {
  background-color: #d1dbe1 !important;
}

.bg-gray-200 {
  background-color: #e4e7ea !important;
}

a.bg-gray-200:hover, a.bg-gray-200:focus,
button.bg-gray-200:hover,
button.bg-gray-200:focus {
  background-color: #c7ced4 !important;
}

.bg-gray-300 {
  background-color: #c8ced3 !important;
}

a.bg-gray-300:hover, a.bg-gray-300:focus,
button.bg-gray-300:hover,
button.bg-gray-300:focus {
  background-color: #acb5bc !important;
}

.bg-gray-400 {
  background-color: #acb4bc !important;
}

a.bg-gray-400:hover, a.bg-gray-400:focus,
button.bg-gray-400:hover,
button.bg-gray-400:focus {
  background-color: #909ba5 !important;
}

.bg-gray-500 {
  background-color: #8f9ba6 !important;
}

a.bg-gray-500:hover, a.bg-gray-500:focus,
button.bg-gray-500:hover,
button.bg-gray-500:focus {
  background-color: #73828f !important;
}

.bg-gray-600 {
  background-color: #73818f !important;
}

a.bg-gray-600:hover, a.bg-gray-600:focus,
button.bg-gray-600:hover,
button.bg-gray-600:focus {
  background-color: #5c6873 !important;
}

.bg-gray-700 {
  background-color: #5c6873 !important;
}

a.bg-gray-700:hover, a.bg-gray-700:focus,
button.bg-gray-700:hover,
button.bg-gray-700:focus {
  background-color: #454e57 !important;
}

.bg-gray-800 {
  background-color: #2f353a !important;
}

a.bg-gray-800:hover, a.bg-gray-800:focus,
button.bg-gray-800:hover,
button.bg-gray-800:focus {
  background-color: #181b1e !important;
}

.bg-gray-900 {
  background-color: #23282c !important;
}

a.bg-gray-900:hover, a.bg-gray-900:focus,
button.bg-gray-900:hover,
button.bg-gray-900:focus {
  background-color: #0c0e10 !important;
}

.bg-box {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  -ms-flex-pack: center;
  justify-content: center;
  width: 2.5rem;
  height: 2.5rem;
}

.b-a-0 {
  border: 0 !important;
}

.b-t-0 {
  border-top: 0 !important;
}

.b-r-0 {
  border-right: 0 !important;
}

.b-b-0 {
  border-bottom: 0 !important;
}

.b-l-0 {
  border-left: 0 !important;
}

.b-a-1 {
  border: 1px solid #c8ced3;
}

.b-t-1 {
  border-top: 1px solid #c8ced3;
}

.b-r-1 {
  border-right: 1px solid #c8ced3;
}

.b-b-1 {
  border-bottom: 1px solid #c8ced3;
}

.b-l-1 {
  border-left: 1px solid #c8ced3;
}

.b-a-2 {
  border: 2px solid #c8ced3;
}

.b-t-2 {
  border-top: 2px solid #c8ced3;
}

.b-r-2 {
  border-right: 2px solid #c8ced3;
}

.b-b-2 {
  border-bottom: 2px solid #c8ced3;
}

.b-l-2 {
  border-left: 2px solid #c8ced3;
}

@media (max-width: 575.98px) {
  .d-down-none {
    display: none !important;
  }
}

@media (max-width: 767.98px) {
  .d-sm-down-none {
    display: none !important;
  }
}

@media (max-width: 991.98px) {
  .d-md-down-none {
    display: none !important;
  }
}

@media (max-width: 1199.98px) {
  .d-lg-down-none {
    display: none !important;
  }
}

.d-xl-down-none {
  display: none !important;
}

body {
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
}

.font-xs {
  font-size: .75rem !important;
}

.font-sm {
  font-size: .85rem !important;
}

.font-lg {
  font-size: 1rem !important;
}

.font-xl {
  font-size: 1.25rem !important;
}

.font-2xl {
  font-size: 1.5rem !important;
}

.font-3xl {
  font-size: 1.75rem !important;
}

.font-4xl {
  font-size: 2rem !important;
}

.font-5xl {
  font-size: 2.5rem !important;
}

.text-value {
  font-size: 1.3125rem;
  font-weight: 600;
}

.text-value-sm {
  font-size: 1.09375rem;
  font-weight: 600;
}

.text-value-lg {
  font-size: 1.53125rem;
  font-weight: 600;
}

.text-white .text-muted {
  color: rgba(255, 255, 255, 0.6) !important;
}

.email-app {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: row;
  flex-direction: row;
  background: #fff;
  border: 1px solid #c8ced3;
}

.email-app nav {
  -ms-flex: 0 0 200px;
  flex: 0 0 200px;
  padding: 1rem;
  border-right: 1px solid #c8ced3;
}

.email-app nav .btn-block {
  margin-bottom: 15px;
}

.email-app nav .nav {
  -ms-flex-direction: column;
  flex-direction: column;
}

.email-app nav .nav-item {
  position: relative;
}

.email-app nav .nav-link {
  color: #23282c;
  border-bottom: 1px solid #c8ced3;
}

.email-app nav .nav-link i {
  width: 20px;
  margin: 0 10px 0 0;
  font-size: 14px;
  text-align: center;
}

.email-app nav .nav-link .badge {
  float: right;
  margin-top: 4px;
  margin-left: 10px;
}

.email-app main {
  -ms-flex: 1;
  flex: 1;
  min-width: 0;
  padding: 1rem;
}

.email-app .inbox .toolbar {
  padding-bottom: 1rem;
  border-bottom: 1px solid #c8ced3;
}

.email-app .inbox .messages {
  padding: 0;
  list-style: none;
}

.email-app .inbox .message {
  position: relative;
  padding: 1rem 1rem 1rem 2rem;
  cursor: pointer;
  border-bottom: 1px solid #c8ced3;
}

.email-app .inbox .message:hover {
  background: #f0f3f5;
}

.email-app .inbox .message .actions {
  position: absolute;
  left: 0;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
}

.email-app .inbox .message .actions .action {
  width: 2rem;
  margin-bottom: 0.5rem;
  color: #c8ced3;
  text-align: center;
}

.email-app .inbox .message a {
  color: #000;
}

.email-app .inbox .message a:hover {
  text-decoration: none;
}

.email-app .inbox .message.unread .header,
.email-app .inbox .message.unread .title {
  font-weight: 700;
}

.email-app .inbox .message .header {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: row;
  flex-direction: row;
  margin-bottom: 0.5rem;
}

.email-app .inbox .message .header .date {
  margin-left: auto;
}

.email-app .inbox .message .title {
  margin-bottom: 0.5rem;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

.email-app .inbox .message .description {
  font-size: 12px;
}

.email-app .message .toolbar {
  padding-bottom: 1rem;
  border-bottom: 1px solid #c8ced3;
}

.email-app .message .details .title {
  padding: 1rem 0;
  font-weight: 700;
}

.email-app .message .details .header {
  display: -ms-flexbox;
  display: flex;
  padding: 1rem 0;
  margin: 1rem 0;
  border-top: 1px solid #c8ced3;
  border-bottom: 1px solid #c8ced3;
}

.email-app .message .details .header .avatar {
  width: 40px;
  height: 40px;
  margin-right: 1rem;
}

.email-app .message .details .header .from {
  -ms-flex-item-align: center;
  align-self: center;
  font-size: 12px;
  color: #73818f;
}

.email-app .message .details .header .from span {
  display: block;
  font-weight: 700;
}

.email-app .message .details .header .date {
  margin-left: auto;
}

.email-app .message .details .attachments {
  padding: 1rem 0;
  margin-bottom: 1rem;
  border-top: 3px solid #f0f3f5;
  border-bottom: 3px solid #f0f3f5;
}

.email-app .message .details .attachments .attachment {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-item-align: center;
  align-self: center;
  margin: 0.5rem 0;
  font-size: 12px;
}

.email-app .message .details .attachments .attachment .badge {
  margin: 0 0.5rem;
  line-height: inherit;
}

.email-app .message .details .attachments .attachment .menu {
  margin-left: auto;
}

.email-app .message .details .attachments .attachment .menu a {
  padding: 0 0.5rem;
  font-size: 14px;
  color: #c8ced3;
}

@media (max-width: 767.98px) {
  .email-app {
    -ms-flex-direction: column;
    flex-direction: column;
  }
  .email-app nav {
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
  }
}

@media (max-width: 575.98px) {
  .email-app .message .header {
    -ms-flex-flow: row wrap;
    flex-flow: row wrap;
  }
  .email-app .message .header .date {
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
  }
}

*[dir="rtl"] {
  direction: rtl;
  unicode-bidi: embed;
}

*[dir="rtl"] body {
  text-align: right;
}

*[dir="rtl"] .dropdown-item {
  text-align: right;
}

*[dir="rtl"] .dropdown-item i {
  margin-right: -10px;
  margin-left: 10px;
}

*[dir="rtl"] .dropdown-item .badge {
  right: auto;
  left: 10px;
}

.ie-custom-properties {
  blue: #20a8d8;
  indigo: #6610f2;
  purple: #6f42c1;
  pink: #e83e8c;
  red: #f86c6b;
  orange: #f8cb00;
  yellow: #ffc107;
  green: #4dbd74;
  teal: #20c997;
  cyan: #17a2b8;
  white: #fff;
  gray: #73818f;
  gray-dark: #2f353a;
  light-blue: #63c2de;
  primary: #20a8d8;
  secondary: #c8ced3;
  success: #4dbd74;
  info: #63c2de;
  warning: #ffc107;
  danger: #f86c6b;
  light: #f0f3f5;
  dark: #2f353a;
  breakpoint-xs: 0;
  breakpoint-sm: 576px;
  breakpoint-md: 768px;
  breakpoint-lg: 992px;
  breakpoint-xl: 1200px;
}

.valid-feedback {
  display: none;
  width: 100%;
  margin-top: 0.25rem;
  font-size: 80%;
  color: #4dbd74;
}

.valid-tooltip {
  position: absolute;
  top: 100%;
  z-index: 5;
  display: none;
  max-width: 100%;
  padding: 0.25rem 0.5rem;
  margin-top: .1rem;
  font-size: 0.765625rem;
  line-height: 1.5;
  color: #fff;
  background-color: rgba(77, 189, 116, 0.9);
  border-radius: 0.25rem;
}

.was-validated .form-control:valid, .form-control.is-valid {
  border-color: #2bb8c4;
  padding-right: calc(1.5em + 0.75rem);
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%234dbd74' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e");
  background-repeat: no-repeat;
  background-position: center right calc(0.375em + 0.1875rem);
  background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
}

.was-validated .form-control:valid:focus, .form-control.is-valid:focus {
  border-color: #2bb8c4;
  box-shadow: 0 0 0 0.2rem rgba(77, 189, 116, 0.25);
}

.was-validated .form-control:valid ~ .valid-feedback,
.was-validated .form-control:valid ~ .valid-tooltip, .form-control.is-valid ~ .valid-feedback,
.form-control.is-valid ~ .valid-tooltip {
  display: block;
}

.was-validated textarea.form-control:valid, textarea.form-control.is-valid {
  padding-right: calc(1.5em + 0.75rem);
  background-position: top calc(0.375em + 0.1875rem) right calc(0.375em + 0.1875rem);
}

.was-validated .custom-select:valid, .custom-select.is-valid {
  border-color: #2bb8c4;
  padding-right: calc((1em + 0.75rem) * 3 / 4 + 1.75rem);
  background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3e%3cpath fill='%232f353a' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right 0.75rem center/8px 10px, url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%234dbd74' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e") #fff no-repeat center right 1.75rem/calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
}

.was-validated .custom-select:valid:focus, .custom-select.is-valid:focus {
  border-color: #2bb8c4;
  box-shadow: 0 0 0 0.2rem rgba(77, 189, 116, 0.25);
}

.was-validated .custom-select:valid ~ .valid-feedback,
.was-validated .custom-select:valid ~ .valid-tooltip, .custom-select.is-valid ~ .valid-feedback,
.custom-select.is-valid ~ .valid-tooltip {
  display: block;
}

.was-validated .form-control-file:valid ~ .valid-feedback,
.was-validated .form-control-file:valid ~ .valid-tooltip, .form-control-file.is-valid ~ .valid-feedback,
.form-control-file.is-valid ~ .valid-tooltip {
  display: block;
}

.was-validated .form-check-input:valid ~ .form-check-label, .form-check-input.is-valid ~ .form-check-label {
  color: #4dbd74;
}

.was-validated .form-check-input:valid ~ .valid-feedback,
.was-validated .form-check-input:valid ~ .valid-tooltip, .form-check-input.is-valid ~ .valid-feedback,
.form-check-input.is-valid ~ .valid-tooltip {
  display: block;
}

.was-validated .custom-control-input:valid ~ .custom-control-label, .custom-control-input.is-valid ~ .custom-control-label {
  color: #4dbd74;
}

.was-validated .custom-control-input:valid ~ .custom-control-label::before, .custom-control-input.is-valid ~ .custom-control-label::before {
  border-color: #2bb8c4;
}

.was-validated .custom-control-input:valid ~ .valid-feedback,
.was-validated .custom-control-input:valid ~ .valid-tooltip, .custom-control-input.is-valid ~ .valid-feedback,
.custom-control-input.is-valid ~ .valid-tooltip {
  display: block;
}

.was-validated .custom-control-input:valid:checked ~ .custom-control-label::before, .custom-control-input.is-valid:checked ~ .custom-control-label::before {
  border-color: #72cb91;
  background-color: #72cb91;
}

.was-validated .custom-control-input:valid:focus ~ .custom-control-label::before, .custom-control-input.is-valid:focus ~ .custom-control-label::before {
  box-shadow: 0 0 0 0.2rem rgba(77, 189, 116, 0.25);
}

.was-validated .custom-control-input:valid:focus:not(:checked) ~ .custom-control-label::before, .custom-control-input.is-valid:focus:not(:checked) ~ .custom-control-label::before {
  border-color: #2bb8c4;
}

.was-validated .custom-file-input:valid ~ .custom-file-label, .custom-file-input.is-valid ~ .custom-file-label {
  border-color: #2bb8c4;
}

.was-validated .custom-file-input:valid ~ .valid-feedback,
.was-validated .custom-file-input:valid ~ .valid-tooltip, .custom-file-input.is-valid ~ .valid-feedback,
.custom-file-input.is-valid ~ .valid-tooltip {
  display: block;
}

.was-validated .custom-file-input:valid:focus ~ .custom-file-label, .custom-file-input.is-valid:focus ~ .custom-file-label {
  border-color: #2bb8c4;
  box-shadow: 0 0 0 0.2rem rgba(77, 189, 116, 0.25);
}

.invalid-feedback {
  display: none;
  width: 100%;
  margin-top: 0.25rem;
  font-size: 80%;
  color: #f86c6b;
}

.invalid-tooltip {
  position: absolute;
  top: 100%;
  z-index: 5;
  display: none;
  max-width: 100%;
  padding: 0.25rem 0.5rem;
  margin-top: .1rem;
  font-size: 0.765625rem;
  line-height: 1.5;
  color: #fff;
  background-color: rgba(248, 108, 107, 0.9);
  border-radius: 0.25rem;
}

.was-validated .form-control:invalid, .form-control.is-invalid {
  border-color: #f86c6b;
  padding-right: calc(1.5em + 0.75rem);
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23f86c6b' viewBox='-2 -2 7 7'%3e%3cpath stroke='%23f86c6b' d='M0 0l3 3m0-3L0 3'/%3e%3ccircle r='.5'/%3e%3ccircle cx='3' r='.5'/%3e%3ccircle cy='3' r='.5'/%3e%3ccircle cx='3' cy='3' r='.5'/%3e%3c/svg%3E");
  background-repeat: no-repeat;
  background-position: center right calc(0.375em + 0.1875rem);
  background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
}

.was-validated .form-control:invalid:focus, .form-control.is-invalid:focus {
  border-color: #f86c6b;
  box-shadow: 0 0 0 0.2rem rgba(248, 108, 107, 0.25);
}

.was-validated .form-control:invalid ~ .invalid-feedback,
.was-validated .form-control:invalid ~ .invalid-tooltip, .form-control.is-invalid ~ .invalid-feedback,
.form-control.is-invalid ~ .invalid-tooltip {
  display: block;
}

.was-validated textarea.form-control:invalid, textarea.form-control.is-invalid {
  padding-right: calc(1.5em + 0.75rem);
  background-position: top calc(0.375em + 0.1875rem) right calc(0.375em + 0.1875rem);
}

.was-validated .custom-select:invalid, .custom-select.is-invalid {
  border-color: #f86c6b;
  padding-right: calc((1em + 0.75rem) * 3 / 4 + 1.75rem);
  background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3e%3cpath fill='%232f353a' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right 0.75rem center/8px 10px, url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23f86c6b' viewBox='-2 -2 7 7'%3e%3cpath stroke='%23f86c6b' d='M0 0l3 3m0-3L0 3'/%3e%3ccircle r='.5'/%3e%3ccircle cx='3' r='.5'/%3e%3ccircle cy='3' r='.5'/%3e%3ccircle cx='3' cy='3' r='.5'/%3e%3c/svg%3E") #fff no-repeat center right 1.75rem/calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
}

.was-validated .custom-select:invalid:focus, .custom-select.is-invalid:focus {
  border-color: #f86c6b;
  box-shadow: 0 0 0 0.2rem rgba(248, 108, 107, 0.25);
}

.was-validated .custom-select:invalid ~ .invalid-feedback,
.was-validated .custom-select:invalid ~ .invalid-tooltip, .custom-select.is-invalid ~ .invalid-feedback,
.custom-select.is-invalid ~ .invalid-tooltip {
  display: block;
}

.was-validated .form-control-file:invalid ~ .invalid-feedback,
.was-validated .form-control-file:invalid ~ .invalid-tooltip, .form-control-file.is-invalid ~ .invalid-feedback,
.form-control-file.is-invalid ~ .invalid-tooltip {
  display: block;
}

.was-validated .form-check-input:invalid ~ .form-check-label, .form-check-input.is-invalid ~ .form-check-label {
  color: #f86c6b;
}

.was-validated .form-check-input:invalid ~ .invalid-feedback,
.was-validated .form-check-input:invalid ~ .invalid-tooltip, .form-check-input.is-invalid ~ .invalid-feedback,
.form-check-input.is-invalid ~ .invalid-tooltip {
  display: block;
}

.was-validated .custom-control-input:invalid ~ .custom-control-label, .custom-control-input.is-invalid ~ .custom-control-label {
  color: #f86c6b;
}

.was-validated .custom-control-input:invalid ~ .custom-control-label::before, .custom-control-input.is-invalid ~ .custom-control-label::before {
  border-color: #f86c6b;
}

.was-validated .custom-control-input:invalid ~ .invalid-feedback,
.was-validated .custom-control-input:invalid ~ .invalid-tooltip, .custom-control-input.is-invalid ~ .invalid-feedback,
.custom-control-input.is-invalid ~ .invalid-tooltip {
  display: block;
}

.was-validated .custom-control-input:invalid:checked ~ .custom-control-label::before, .custom-control-input.is-invalid:checked ~ .custom-control-label::before {
  border-color: #fa9c9c;
  background-color: #fa9c9c;
}

.was-validated .custom-control-input:invalid:focus ~ .custom-control-label::before, .custom-control-input.is-invalid:focus ~ .custom-control-label::before {
  box-shadow: 0 0 0 0.2rem rgba(248, 108, 107, 0.25);
}

.was-validated .custom-control-input:invalid:focus:not(:checked) ~ .custom-control-label::before, .custom-control-input.is-invalid:focus:not(:checked) ~ .custom-control-label::before {
  border-color: #f86c6b;
}

.was-validated .custom-file-input:invalid ~ .custom-file-label, .custom-file-input.is-invalid ~ .custom-file-label {
  border-color: #f86c6b;
}

.was-validated .custom-file-input:invalid ~ .invalid-feedback,
.was-validated .custom-file-input:invalid ~ .invalid-tooltip, .custom-file-input.is-invalid ~ .invalid-feedback,
.custom-file-input.is-invalid ~ .invalid-tooltip {
  display: block;
}

.was-validated .custom-file-input:invalid:focus ~ .custom-file-label, .custom-file-input.is-invalid:focus ~ .custom-file-label {
  border-color: #f86c6b;
  box-shadow: 0 0 0 0.2rem rgba(248, 108, 107, 0.25);
}
/*# sourceMappingURL=style.css.map */
<?php
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4',
    'orientation' => 'P',
    'margin_left' => 15,
    'margin_right' => 15,
    'margin_top' => 10,
    'margin_bottom' => 10,
    'margin_header' => 0,
    'margin_footer' => 0
]);

$html = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            line-height: 1.2;
            color: #000;
        }
        
        .header {
            display: table;
            width: 100%;
            margin-bottom: 20px;
        }
        
        .logo {
            display: table-cell;
            width: 60px;
            height: 60px;
            background-color: #8B9A4A;
            border-radius: 50%;
            text-align: center;
            vertical-align: middle;
            color: white;
            font-size: 30px;
            font-weight: bold;
        }
        
        .header-text {
            display: table-cell;
            vertical-align: middle;
            text-align: center;
            padding-left: 15px;
            color: #666;
            font-size: 12px;
            line-height: 1.3;
        }
        
        .form-ref {
            float: right;
            font-size: 10px;
            color: #666;
            margin-top: -50px;
        }
        
        .form-title {
            text-align: center;
            font-weight: bold;
            text-decoration: underline;
            margin: 15px 0;
            font-size: 14px;
        }
        
        .form-fields {
            margin-bottom: 15px;
        }
        
        .form-field {
            margin-bottom: 6px;
            font-size: 12px;
        }
        
        .underline {
            border-bottom: 1px solid #000;
            display: inline-block;
            width: 250px;
            height: 15px;
        }
        
        .dear-participant {
            font-weight: bold;
            margin: 15px 0 8px 0;
            font-size: 12px;
        }
        
        .instructions {
            font-size: 11px;
            line-height: 1.3;
            margin-bottom: 15px;
            text-align: justify;
        }
        
        .part-title {
            font-weight: bold;
            margin: 15px 0 8px 0;
            font-size: 12px;
        }
        
        .rating-instruction {
            font-size: 11px;
            margin-bottom: 12px;
        }
        
        .evaluation-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
            font-size: 10px;
        }
        
        .evaluation-table th,
        .evaluation-table td {
            border: 1px solid #000;
            padding: 4px;
            text-align: left;
            vertical-align: top;
        }
        
        .evaluation-table th {
            background-color: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }
        
        .rating-header {
            width: 30px;
            text-align: center;
        }
        
        .section-header {
            font-weight: bold;
            background-color: #e0e0e0;
        }
        
        .sub-item {
            padding-left: 15px;
        }
        
        .checkbox-cell {
            text-align: center;
            width: 30px;
        }
        
        .checkbox {
            width: 12px;
            height: 12px;
            border: 1px solid #000;
            display: inline-block;
        }
        
        .provider-evaluation-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
            font-size: 9px;
        }
        
        .provider-evaluation-table th,
        .provider-evaluation-table td {
            border: 1px solid #000;
            padding: 3px;
            text-align: center;
            vertical-align: middle;
        }
        
        .provider-evaluation-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        
        .additional-comments {
            margin-bottom: 15px;
        }
        
        .comment-section {
            margin-bottom: 12px;
            font-size: 11px;
        }
        
        .comment-box {
            border: 1px solid #000;
            width: 100%;
            height: 40px;
            margin-top: 5px;
        }
        
        .footer {
            text-align: center;
            font-size: 11px;
            color: #666;
            margin-top: 20px;
            font-style: italic;
        }
        
        .signature-section {
            margin-top: 30px;
            font-size: 11px;
        }
        
        .signature-line {
            border-bottom: 1px solid #000;
            display: inline-block;
            width: 200px;
            height: 15px;
            margin-bottom: 5px;
        }
        
        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">+</div>
        <div class="header-text">
            Republic of the Philippines<br>
            Department of Health<br>
            <strong>CARAGA REGIONAL HOSPITAL</strong><br>
            Surigao City
        </div>
    </div>
    
    <div class="form-ref">
        TRU-11<br>
        Rev. No. 0<br>
        Effectivity: 12/23/24
    </div>
    
    <div class="form-title">CPD Program Evaluation Form</div>
    
    <div class="form-fields">
        <div class="form-field">
            <strong>Title of Program:</strong> <span class="underline"></span>
        </div>
        <div class="form-field">
            <strong>Date:</strong> <span class="underline" style="width: 200px;"></span>
        </div>
        <div class="form-field">
            <strong>Venue:</strong> <span class="underline"></span>
        </div>
    </div>
    
    <div class="dear-participant">Dear Participant,</div>
    
    <div class="instructions">
        Please take time to give feedback on the <u>Learning and Development Intervention (LDI), e.g., training,</u> you attended. This will help the Caraga Regional Hospital PETRU in selecting/engaging appropriate interventions in the future. You may continue on a separate form if necessary.
    </div>
    
    <div class="part-title">Part I. Learning Intervention Evaluation Instructions:</div>
    <div class="rating-instruction">Please rate the following in terms of your satisfaction using 1 – 5 with 1 as Strongly Disagree and 5 as Strongly Agree</div>
    
    <table class="evaluation-table">
        <thead>
            <tr>
                <th style="width: 60%;">STATEMENTS</th>
                <th class="rating-header">1</th>
                <th class="rating-header">2</th>
                <th class="rating-header">3</th>
                <th class="rating-header">4</th>
                <th class="rating-header">5</th>
            </tr>
        </thead>
        <tbody>
            <tr class="section-header">
                <td><strong>1. TRAINING/WORKSHOP OBJECTIVES</strong></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
            </tr>
            <tr>
                <td class="sub-item">a. The objectives were clearly stated</td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
            </tr>
            <tr>
                <td class="sub-item">b. The objectives were met</td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
            </tr>
            <tr>
                <td class="sub-item">c. The training/workshop is relevant to my line of work</td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
            </tr>
            <tr class="section-header">
                <td><strong>2. TOPICS</strong></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
            </tr>
            <tr>
                <td class="sub-item">a. The topics presented were relevant to the stated objectives</td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
            </tr>
            <tr>
                <td class="sub-item">b. The topics were discussed clearly</td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
            </tr>
            <tr>
                <td class="sub-item">c. The topics contents were organized and easy to follow</td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
            </tr>
            <tr class="section-header">
                <td><strong>3. METHODOLOGY</strong></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
            </tr>
            <tr>
                <td class="sub-item">a. The strategies or methods used were appropriate to achieve desired outputs</td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
            </tr>
            <tr>
                <td class="sub-item">b. The strategies or methods used provided for optimum interaction between and among the Resource Person and participants</td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
            </tr>
            <tr>
                <td class="sub-item">c. The course dynamics were conducive to optimum learning</td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
            </tr>
            <tr class="section-header">
                <td><strong>4. PRESENTATION, VISUAL AIDS AND OTHER MATERIALS</strong></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
            </tr>
            <tr>
                <td class="sub-item">a. The presentations were clear and concise</td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
            </tr>
            <tr>
                <td class="sub-item">b. The visual aids and/or instructional materials are adequate and suitable to facilitate learning</td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
            </tr>
            <tr class="section-header">
                <td><strong>5. TIME</strong></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
            </tr>
            <tr>
                <td class="sub-item">a. Training/workshop starts and ends on the agreed time</td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
            </tr>
            <tr>
                <td class="sub-item">b. Time allotted was sufficient to cover all activities</td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
            </tr>
            <tr class="section-header">
                <td><strong>6. SECRETARIAT</strong></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
            </tr>
            <tr>
                <td class="sub-item">They were approachable and promptly attended to concerns and queries</td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
            </tr>
            <tr class="section-header">
                <td><strong>7. VENUE AND MEALS</strong></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
            </tr>
            <tr>
                <td class="sub-item">a. Meals and snacks were satisfying and serving amounts were sufficient</td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
            </tr>
            <tr>
                <td class="sub-item">b. Facilities were conducive to learning</td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
            </tr>
            <tr>
                <td class="sub-item">c. The venue was appropriate vis-à-vis the training/workshop objectives</td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
                <td class="checkbox-cell"><span class="checkbox"></span></td>
            </tr>
            <tr class="section-header">
                <td colspan="6"><strong>TOTAL (To be filled out by the Secretariat)</strong></td>
            </tr>
        </tbody>
    </table>
    
    <!-- Part II Section -->
    <div class="part-title">Part II. Learning Provider Evaluation Instructions:</div>
    <div class="rating-instruction">Put check mark (√) on the appropriate box corresponding to your response on each item using the following scale: <strong>4 - Excellent, 3 - Good, 2 – Fair, 1 – Poor</strong></div>
    
    <table class="provider-evaluation-table">
        <thead>
            <tr>
                <th rowspan="2" style="width: 20%;">NAME OF SUBJECT MATTER EXPERTS / RESOURCE PERSONS</th>
                <th colspan="2" style="text-align: center;">A. Subject Matter Expert (SME) / Resource Person (RP)</th>
                <th colspan="4" style="text-align: center;">B. Relevance and Method of the Learning and Development Intervention</th>
            </tr>
            <tr>
                <th style="font-size: 8px; width: 12%;">Expertise on the subject matter</th>
                <th style="font-size: 8px; width: 12%;">Ability to create an interactive / engaging learning environment</th>
                <th style="font-size: 8px; width: 12%;">Ability to adjust/adapt to the learning needs of the participants</th>
                <th style="font-size: 8px; width: 12%;">The appropriateness of the methods employed by the SME/RP</th>
                <th style="font-size: 8px; width: 12%;">The pace of the sessions and activities to facilitate learning</th>
                <th style="font-size: 8px; width: 12%;">The usefulness of the materials, visual aids provided</th>
            </tr>
            <tr>
                <th></th>
                <th style="font-size: 8px;">4 &nbsp; 3 &nbsp; 2 &nbsp; 1</th>
                <th style="font-size: 8px;">4 &nbsp; 3 &nbsp; 2 &nbsp; 1</th>
                <th style="font-size: 8px;">4 &nbsp; 3 &nbsp; 2 &nbsp; 1</th>
                <th style="font-size: 8px;">4 &nbsp; 3 &nbsp; 2 &nbsp; 1</th>
                <th style="font-size: 8px;">4 &nbsp; 3 &nbsp; 2 &nbsp; 1</th>
                <th style="font-size: 8px;">4 &nbsp; 3 &nbsp; 2 &nbsp; 1</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="height: 30px; border-right: 1px solid #000;"></td>
                <td style="text-align: center; font-size: 8px;">
                    <span class="checkbox"></span> 4 &nbsp;
                    <span class="checkbox"></span> 3 &nbsp;
                    <span class="checkbox"></span> 2 &nbsp;
                    <span class="checkbox"></span> 1
                </td>
                <td style="text-align: center; font-size: 8px;">
                    <span class="checkbox"></span> 4 &nbsp;
                    <span class="checkbox"></span> 3 &nbsp;
                    <span class="checkbox"></span> 2 &nbsp;
                    <span class="checkbox"></span> 1
                </td>
                <td style="text-align: center; font-size: 8px;">
                    <span class="checkbox"></span> 4 &nbsp;
                    <span class="checkbox"></span> 3 &nbsp;
                    <span class="checkbox"></span> 2 &nbsp;
                    <span class="checkbox"></span> 1
                </td>
                <td style="text-align: center; font-size: 8px;">
                    <span class="checkbox"></span> 4 &nbsp;
                    <span class="checkbox"></span> 3 &nbsp;
                    <span class="checkbox"></span> 2 &nbsp;
                    <span class="checkbox"></span> 1
                </td>
                <td style="text-align: center; font-size: 8px;">
                    <span class="checkbox"></span> 4 &nbsp;
                    <span class="checkbox"></span> 3 &nbsp;
                    <span class="checkbox"></span> 2 &nbsp;
                    <span class="checkbox"></span> 1
                </td>
                <td style="text-align: center; font-size: 8px;">
                    <span class="checkbox"></span> 4 &nbsp;
                    <span class="checkbox"></span> 3 &nbsp;
                    <span class="checkbox"></span> 2 &nbsp;
                    <span class="checkbox"></span> 1
                </td>
            </tr>
            <tr>
                <td style="height: 30px; border-right: 1px solid #000;"></td>
                <td style="text-align: center; font-size: 8px;">
                    <span class="checkbox"></span> 4 &nbsp;
                    <span class="checkbox"></span> 3 &nbsp;
                    <span class="checkbox"></span> 2 &nbsp;
                    <span class="checkbox"></span> 1
                </td>
                <td style="text-align: center; font-size: 8px;">
                    <span class="checkbox"></span> 4 &nbsp;
                    <span class="checkbox"></span> 3 &nbsp;
                    <span class="checkbox"></span> 2 &nbsp;
                    <span class="checkbox"></span> 1
                </td>
                <td style="text-align: center; font-size: 8px;">
                    <span class="checkbox"></span> 4 &nbsp;
                    <span class="checkbox"></span> 3 &nbsp;
                    <span class="checkbox"></span> 2 &nbsp;
                    <span class="checkbox"></span> 1
                </td>
                <td style="text-align: center; font-size: 8px;">
                    <span class="checkbox"></span> 4 &nbsp;
                    <span class="checkbox"></span> 3 &nbsp;
                    <span class="checkbox"></span> 2 &nbsp;
                    <span class="checkbox"></span> 1
                </td>
                <td style="text-align: center; font-size: 8px;">
                    <span class="checkbox"></span> 4 &nbsp;
                    <span class="checkbox"></span> 3 &nbsp;
                    <span class="checkbox"></span> 2 &nbsp;
                    <span class="checkbox"></span> 1
                </td>
                <td style="text-align: center; font-size: 8px;">
                    <span class="checkbox"></span> 4 &nbsp;
                    <span class="checkbox"></span> 3 &nbsp;
                    <span class="checkbox"></span> 2 &nbsp;
                    <span class="checkbox"></span> 1
                </td>
            </tr>
            <tr>
                <td style="height: 30px; border-right: 1px solid #000;"></td>
                <td style="text-align: center; font-size: 8px;">
                    <span class="checkbox"></span> 4 &nbsp;
                    <span class="checkbox"></span> 3 &nbsp;
                    <span class="checkbox"></span> 2 &nbsp;
                    <span class="checkbox"></span> 1
                </td>
                <td style="text-align: center; font-size: 8px;">
                    <span class="checkbox"></span> 4 &nbsp;
                    <span class="checkbox"></span> 3 &nbsp;
                    <span class="checkbox"></span> 2 &nbsp;
                    <span class="checkbox"></span> 1
                </td>
                <td style="text-align: center; font-size: 8px;">
                    <span class="checkbox"></span> 4 &nbsp;
                    <span class="checkbox"></span> 3 &nbsp;
                    <span class="checkbox"></span> 2 &nbsp;
                    <span class="checkbox"></span> 1
                </td>
                <td style="text-align: center; font-size: 8px;">
                    <span class="checkbox"></span> 4 &nbsp;
                    <span class="checkbox"></span> 3 &nbsp;
                    <span class="checkbox"></span> 2 &nbsp;
                    <span class="checkbox"></span> 1
                </td>
                <td style="text-align: center; font-size: 8px;">
                    <span class="checkbox"></span> 4 &nbsp;
                    <span class="checkbox"></span> 3 &nbsp;
                    <span class="checkbox"></span> 2 &nbsp;
                    <span class="checkbox"></span> 1
                </td>
                <td style="text-align: center; font-size: 8px;">
                    <span class="checkbox"></span> 4 &nbsp;
                    <span class="checkbox"></span> 3 &nbsp;
                    <span class="checkbox"></span> 2 &nbsp;
                    <span class="checkbox"></span> 1
                </td>
            </tr>
            <tr style="background-color: #f0f0f0;">
                <td style="text-align: center; font-weight: bold;">TOTAL</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    
    <!-- Part III Section -->
    <div class="part-title">Part III. Additional Comments and Suggestions:</div>
    
    <div class="additional-comments">
        <div class="comment-section">
            <span style="font-weight: bold;">As a whole, are you satisfied with the activity?</span>
            <span style="margin-left: 20px;"><span class="checkbox"></span> Yes</span>
            <span style="margin-left: 15px;"><span class="checkbox"></span> No</span>
        </div>
        
        <div class="comment-section">
            <span style="font-weight: bold;">What aspects of the activity did you find most useful?</span>
            <div class="comment-box"></div>
        </div>
        
        <div class="comment-section">
            <span style="font-weight: bold;">What aspects of the activity did you find least useful?</span>
            <div class="comment-box"></div>
        </div>
        
        <div class="comment-section">
            <span style="font-weight: bold;">What would you like to see included in future activities?</span>
            <div class="comment-box"></div>
        </div>
        
        <div class="comment-section">
            <span style="font-weight: bold;">Other comments/suggestions:</span>
            <div class="comment-box" style="height: 60px;"></div>
        </div>
    </div>
    
    <!-- Signature Section -->
    <div class="signature-section">
        <div style="margin-top: 40px;">
            <div style="float: left; width: 45%;">
                <div style="margin-bottom: 5px;">Name and Signature of Participant:</div>
                <div class="signature-line"></div><br>
                <div style="text-align: center; font-size: 10px; margin-top: 5px;">Date</div>
            </div>
            
            <div style="float: right; width: 45%;">
                <div style="margin-bottom: 5px;">Position/Designation:</div>
                <div class="signature-line"></div><br>
                <div style="text-align: center; font-size: 10px; margin-top: 5px;">Office/Unit</div>
            </div>
            
            <div style="clear: both;"></div>
        </div>
    </div>
    
    <!-- Footer Section -->
    <div class="footer">
        <p>Thank you for taking the time to complete this evaluation form.</p>
        <p>Your feedback is valuable in improving our training programs.</p>
    </div>
    
</body>
</html>';

// Write HTML to PDF
$mpdf->WriteHTML($html);

// Output PDF
try {
    // For direct download
    $mpdf->Output('CPD_Program_Evaluation_Form.pdf', 'D');
    
    // Alternative options:
    // $mpdf->Output('CPD_Program_Evaluation_Form.pdf', 'I'); // Display in browser
    // $mpdf->Output('CPD_Program_Evaluation_Form.pdf', 'F'); // Save to file
    // $mpdf->Output('CPD_Program_Evaluation_Form.pdf', 'S'); // Return as string
    
} catch (\Mpdf\MpdfException $e) {
    echo "Error generating PDF: " . $e->getMessage();
}
?>
import React, { useState } from 'react';
import Stepper from './Stepper';
import Step1ApplicantDetails from './components/Step1ApplicantDetails';
// import Step2FamilyDetail from './components/Step2FamilyDetail';
// import Step3CounsellorsAssessment from './components/Step3CounsellorsAssessment';
// import Step4EconomicUpliftmentPlan from './components/Step4EconomicUpliftmentPlan';
// import Step5OutcomeAndDeclaration from './components/Step5OutcomeAndDeclaration';
// import Step6Attachments from './components/Step6Attachments';
import api from './api';

const stepComponents = [
  Step1ApplicantDetails, 
  // Step2FamilyDetail, Step3CounsellorsAssessment,  Step4EconomicUpliftmentPlan, Step5OutcomeAndDeclaration, Step6Attachments
];

const stepLabels = [
  "Applicant’s Details", 
  //"Family Detail", "Counsellor’s Assessment",  "Economic Upliftment Plan", "Outcome and Declaration", "Attachments"
];

export default function App() {
  const [data, setData] = useState({});
  const [stepIdx, setStepIdx] = useState(0);
  const [status, setStatus] = useState(Array(stepComponents.length).fill('pending'));

  const CurrentStep = stepComponents[stepIdx];

  function goTo(idx) {
    setStepIdx(idx);
  }

  function next(values) {
    setData(prev => ({ ...prev, ...values }));
    setStatus(prev => prev.map((s, i) => i === stepIdx ? 'complete' : s));
    setStepIdx(prev => Math.min(prev + 1, stepComponents.length - 1));
  }

  function back() {
    setStatus(prev => prev.map((s, i) => i === stepIdx ? 'skipped' : s));
    setStepIdx(prev => Math.max(prev - 1, 0));
  }

  function submit(values) {
    const payload = { ...data, ...values };
    api.submitApplication(payload).then(() => alert('Submitted successfully'));
  }

  return (
    <div className="max-w-3xl mx-auto p-6 bg-gray-50">
      <Stepper steps={stepLabels} currentStep={goTo} status={status} />
      <div className="bg-white shadow rounded-lg p-8">
        <CurrentStep
          initialValues={data}
          onNext={stepIdx < stepComponents.length - 1 ? next : submit}
          onBack={stepIdx > 0 ? back : null}
        />
      </div>
    </div>
  );
}

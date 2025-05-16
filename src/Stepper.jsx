import React from 'react';

export default function Stepper({ steps, currentStep, status }) {
  const iconClass = (stepStatus) => {
    if (stepStatus === 'complete') {
      return 'bg-success'; // Completed - Green
    }
    if (stepStatus === 'skipped') {
      return 'bg-danger'; // Skipped - Red
    }
    return 'bg-muted'; // Pending - Grey
  };

  const iconImages = [
    '/images/applicant-icon.png',
    '/images/family-icon.png',
    '/images/counselor-icon.png',
    '/images/plan-icon.png',
    '/images/declaration-icon.png',
    '/images/attachments-icon.png'
  ];

  return (
    <div className="d-flex justify-content-between mb-4">
      {steps.map((label, idx) => {
        const stepStatus = status[idx];

        return (
          <div key={idx} className="text-center">
            <button onClick={() => currentStep(idx)} className="btn btn-link p-0">
              <div className={`d-flex justify-content-center align-items-center w-12 h-12 rounded-circle ${iconClass(stepStatus)}`}>
                <img 
                  src={iconImages[idx]} 
                  alt={label} 
                  style={{ width: '30px', height: '30px', objectFit: 'cover' }} 
                />
              </div>
              <div className="text-sm mt-1">{label}</div>
            </button>
            {/* Delimiter */}
            {idx < steps.length - 1 && (
              <div className={`h-1 ${stepStatus === 'complete' ? 'bg-success' : 'bg-gray-300'} w-12 mx-auto`} />
            )}
          </div>
        );
      })}
    </div>
  );
}
